@extends('admin.layouts.app')

@section('title', 'Contact List')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="card-title fw-semibold">Contact Requests</h5>
    </div>
    
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Name</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Email</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Mobile</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Service</h6>
            </th>
             <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Message</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Date</h6>
            </th>
            <th class="border-bottom-0">
              <h6 class="fw-semibold mb-0">Action</h6>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <tr>
            <td class="border-bottom-0">
                <h6 class="fw-semibold mb-1">{{ $contact->name }}</h6>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $contact->email }}</p>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $contact->mobile }}</p>
            </td>
            <td class="border-bottom-0">
                <span class="badge bg-primary rounded-3 fw-semibold">{{ $contact->service_type ?? 'N/A' }}</span>
            </td>
             <td class="border-bottom-0">
                <p class="mb-0 fw-normal" title="{{ $contact->message }}">{{ Str::limit($contact->message, 30) }}</p>
            </td>
            <td class="border-bottom-0">
                <p class="mb-0 fw-normal">{{ $contact->created_at->format('d M Y') }}</p>
            </td>
            <td class="border-bottom-0">
                <form action="{{ route('admin.contacts.destroy',$contact->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3">
        {{ $contacts->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
