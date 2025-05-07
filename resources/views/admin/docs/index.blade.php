@extends('layouts.admin')

@section('title', 'Manage Documents')
    <style>
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background-color: #2563eb;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .btn-create:hover {
            background-color: #1e40af;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .admin-table th,
        .admin-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .admin-table th {
            background-color: #1f2937;
            color: #f9fafb;
        }

        .admin-table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .actions {
            display: flex;
            align-items: center;
        }

        .action-buttons {
            display: flex;
            gap: 0.6rem;
        }

        .btn-action {
            color: #6b7280; /* default gray */
            transition: color 0.2s;
        }

        .btn-action svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        .btn-view:hover {
            color: #22c55e; /* green */
        }

        .btn-edit:hover {
            color: #f59e0b; /* amber */
        }

        .btn-delete:hover {
            color: #ef4444; /* red */
        }
    </style>

@section('content')
    <div class="admin-header">
        <h1>Manage Documents</h1>
        <a href="{{ route('admin.docs.create') }}" class="btn-create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Document
        </a>
    </div>

    <table class="admin-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Section</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($docs as $doc)
            <tr>
                <td>{{ $doc->title }}</td>
                <td>{{ $doc->section->title }}</td>
                <td>{{ $doc->updated_at->format('Y-m-d') }}</td>
                <td class="actions">
                    <div class="action-buttons">
                        <!-- View Button -->
                        <a href="{{ route('admin.docs.show', $doc->id) }}" class="btn-action btn-view" title="View">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('admin.docs.edit', $doc->id) }}" class="btn-action btn-edit" title="Edit">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.docs.delete', $doc->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-action btn-delete" title="Delete" style="background:none; border:none; padding:0;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
