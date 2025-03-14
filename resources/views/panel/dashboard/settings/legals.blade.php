<x-kit.dashboard>

    <x-slot name="title">Legal Terms</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Legal Terms</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Upload Legal Files'"
                :icon="'fa fa-gavel'"
                :description="'Fill the form below to upload a new document'" />

            <form action="{{ route('panel.settings.legals.upload') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Select Notice</label>
                            <select class="form-control input-bottom" name="type" required>
                                <option value="">Choose an option</option>
                                <option value="terms">Terms and Conditions</option>
                                <option value="privacy">Privacy Policy</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>PDF Document</label>
                            <input type="file" class="form-control input-bottom" accept="application/pdf" name="_file" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-upload m-r-10"></i> Upload Document</button>

            </form>

        </div>
    </div>

    <div class="row w-50 mx-auto">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-file-invoice fa-3x col-grey"></i>
                    <h4 class="mt-3">Terms and Conditions</h4>

                    @if(get_legals()->terms_and_conditions)
                        <p>{{ strtoupper(explode('/', get_legals()->terms_and_conditions)[3]) }}</p>

                        <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#delTerms"><i class="fa fa-trash-can me-1"></i> Delete</button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delTerms" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="px-3 pt-3 text-center">
                                            <div class="event-type bg-red">
                                                <div class="event-indicator">
                                                    <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                                </div>
                                            </div>
                                            <h3 class="pt-3">Delete Terms Document?</h3>
                                            <p class="text-muted">This action will delete this file, this action cannot be undone!</p>
                                        </div>
                                        <div class="text-center">
                                            <form method="post" action="{{ route('panel.settings.legals.delete') }}">
                                                @csrf
                                                <input type="hidden" name="type" value="terms" required>
                                                <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="col-deep-orange font-italic">* Document is missing, please upload the prepared PDF file.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-file-invoice fa-3x col-grey"></i>
                    <h4 class="mt-3">Privacy Policy</h4>

                    @if(get_legals()->privacy_policy)
                        <p>{{ strtoupper(explode('/', get_legals()->privacy_policy)[3]) }}</p>

                        <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#delPrivacy"><i class="fa fa-trash-can me-1"></i> Delete</button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="delPrivacy" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="px-3 pt-3 text-center">
                                            <div class="event-type bg-red">
                                                <div class="event-indicator">
                                                    <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                                </div>
                                            </div>
                                            <h3 class="pt-3">Delete Privacy Document?</h3>
                                            <p class="text-muted">This action will delete this file, this action cannot be undone!</p>
                                        </div>
                                        <div class="text-center">
                                            <form method="post" action="{{ route('panel.settings.legals.delete') }}">
                                                @csrf
                                                <input type="hidden" name="type" value="privacy" required>
                                                <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="col-deep-orange font-italic">* Document is missing, please upload the prepared PDF file.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-kit.dashboard>
