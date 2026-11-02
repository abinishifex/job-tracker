@extends('layouts.base')

@section('content')

    {{-- Top Header Section --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Job Applications</h1>
            <p class="text-sm text-gray-500">Track every application in one place</p>
        </div>
        <a href="{{ route('applications.create') }}" 
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            <x-heroicons::outline.plus class="w-4 h-4" />
            Add Application
        </a>
    </div>

    {{-- Status Filter Chips --}}
<div class="flex gap-2 mb-6">
    {{-- "All" Filter Link --}}
    <a href="{{ route('applications.index') }}" 
       class="px-3 py-1.5 rounded-full text-xs font-medium border border-gray-200 
              {{ !request('status') ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        All
    </a>

    {{-- Individual Status Pills --}}
    @foreach ([
        'applied'   => 'Applied',
        'interview' => 'Interview',
        'offer'     => 'Offer',
        'rejected'  => 'Rejected'
    ] as $key => $label)
        <a href="{{ route('applications.index', ['status' => $key]) }}" 
           class="px-3 py-1.5 rounded-full text-xs font-medium border border-gray-200 
                  {{ request('status') === $key ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            {{ $label }}
        </a>
    @endforeach
</div>

    {{-- Applications Listing / Empty State --}}
    @if ($applications->isEmpty())
        <div class="text-center py-16 bg-white rounded-xl border border-dashed border-gray-300">
            <x-heroicons::outline.briefcase class="w-10 h-10 text-gray-400 mx-auto mb-3" />
            <p class="text-gray-500 font-medium">No applications yet</p>
            <p class="text-gray-400 text-sm">Add your first one to get started</p>
        </div>
    @else
        {{-- Grid Container will go here --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($applications as $application)
            <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                
                {{-- Header Row: Company, Role, and Status Badge --}}
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $application->company }}</h3>
                        <p class="text-sm text-gray-500">{{ $application->role }}</p>
                    </div>

                    <span class="px-2.5 py-1 rounded-full text-xs font-medium border {{ $application->statusColor() }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>

                {{-- Date Section --}}
                <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-3">
                    <x-heroicons::outline.calendar class="w-3.5 h-3.5" />
                    <span>Applied {{ $application->applied_at->format('M d, Y') }}</span>
                </div>

                {{-- Action Triggers (Edit & Delete) --}}
                {{-- Will be detailed in Phase 5 below --}}
                {{-- Card Actions --}}
    <div class="flex items-center gap-3 text-sm">
        {{-- Edit Link --}}
        <a href="{{ route('applications.edit', $application) }}" 
           class="text-indigo-600 hover:text-indigo-500 font-medium">
            Edit
        </a>

        {{-- Delete Form with Method Spoofing --}}
        <form action="{{ route('applications.destroy', $application) }}" 
              method="POST" 
              onsubmit="return confirm('Delete this application?')">
            @csrf
            @method('DELETE')

            <button type="submit" 
                    class="text-red-500 hover:text-red-600 font-medium cursor-pointer">
                Delete
            </button>
        </form>
    </div>
            </div>
        @endforeach
    </div>
    @endif
@endsection