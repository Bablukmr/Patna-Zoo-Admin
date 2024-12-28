@extends('layout.main')
@section('main-section')

<div class="mt-[100px] mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tenders</h1>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="px-4 py-2">SN.</th>
                        <th class="px-4 py-2">Tender Name</th>
                        <th class="px-4 py-2">Tender Notice No</th>
                        <th class="px-4 py-2">Tender Date</th>
                        <th class="px-4 py-2">PDF</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $x = 1; @endphp
                    @forelse($tenders as $tender)

                    <tr class="{{ $loop->even ? 'table-light' : 'table-white' }} hover:bg-gray-200">
                        <td class="border px-4 py-2">{{ $x++ }}</td>
                        <td class="border px-4 py-2">{{ $tender->tender_name }}</td>
                        <td class="border px-4 py-2">{{ $tender->tender_notice_no }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($tender->tender_date)->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ asset('storage/' . $tender->pdf) }}" target="_blank" class="text-info">
                                <i class="fas fa-file-pdf"></i> Download
                            </a>
                        </td>
                        <td class="border px-4 py-2">
                            @if($tender->active)
                            <span class="badge bg-success text-white"><i class="fas fa-check-circle"></i> Active</span>
                            @else
                            <span class="badge bg-danger text-white"><i class="fas fa-times-circle"></i> Inactive</span>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">No tenders available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
