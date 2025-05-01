@extends('layouts.admin')

@section('title', 'Manage Documents')

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
    </div>>

    <table class="admin-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>API Introduction</td>
            <td><span class="badge published">Published</span></td>
            <td>2023-10-15</td>
            <td class="actions">
                <div class="action-buttons">
                    <!-- View Button -->
                    <a href="/admin/docs/1" class="btn-action btn-view" title="View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('admin.docs.edit', ['id' => 1]) }}" class="btn-action btn-edit" title="Edit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.docs.delete', ['id' => 1]) }}" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="(will-be-dynamic-in-real-app)">
                        <button type="submit" class="btn-action btn-delete" title="Delete">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td>Authentication</td>
            <td><span class="badge draft">Draft</span></td>
            <td>2023-10-10</td>
            <td class="actions">
                <div class="action-buttons">
                    <!-- View Button -->
                    <a href="/admin/docs/1" class="btn-action btn-view" title="View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('admin.docs.edit', ['id' => 2]) }}" class="btn-action btn-edit" title="Edit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.docs.delete', ['id' => 2]) }}" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="(will-be-dynamic-in-real-app)">
                        <button type="submit" class="btn-action btn-delete" title="Delete">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
