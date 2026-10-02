@forelse($reviews as $review)
    <tr>
        <td>{{ $review->created_at->format('M d, Y') }}</td>
        <td>{{ $review->product ? $review->product->name : 'N/A' }}</td>
        <td>
            <strong>{{ $review->name }}</strong><br>
            <small>{{ $review->email ?? 'No email' }}</small>
        </td>
        <td>
            <div class="text-warning">
                @for($i=1; $i<=5; $i++)
                    <i class="ti {{ $i <= $review->rating ? 'ti-star-filled' : 'ti-star' }}"></i>
                @endfor
            </div>
        </td>
        <td>
            <div style="max-height: 80px; overflow-y: auto; font-size: 0.9rem;">
                {{ $review->comment }}
            </div>
            @if($review->ip_address)
                <small class="text-muted d-block mt-1">IP: {{ $review->ip_address }}</small>
            @endif
        </td>
        <td>
            <button class="btn btn-sm toggle-status {{ $review->is_approved ? 'btn-success' : 'btn-secondary' }}" data-id="{{ $review->id }}">
                @if($review->is_approved)
                    <i class="ti ti-check"></i> Approved
                @else
                    <i class="ti ti-x"></i> Hidden
                @endif
            </button>
        </td>
        <td>
            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $review->id }}" title="Delete">
                <i class="ti ti-trash"></i> Delete
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">No reviews found.</td>
    </tr>
@endforelse
