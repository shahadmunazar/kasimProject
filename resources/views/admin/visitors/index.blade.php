@extends('admin.layouts.app')

@section('title', 'Visitor List')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="card-title fw-semibold">Website Visitors</h5>
    </div>
    
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">IP Address</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Country</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">State/Region</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">User Agent</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Visited At</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($visitors as $visitor)
          <tr>
            <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{ $visitor->ip_address }}</h6>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $visitor->country ?? 'N/A' }}</p>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $visitor->state ?? 'N/A' }}</p>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal" title="{{ $visitor->user_agent }}">{{ Str::limit($visitor->user_agent, 40) }}</p>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $visitor->created_at->format('d M Y h:i A') }}</p>
            </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3">
        {{ $visitors->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
