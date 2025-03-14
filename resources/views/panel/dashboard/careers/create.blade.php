<x-panel.dashboard>

    <x-slot name="title">Add A New Campaign</x-slot>

    <x-slot name="css">
        <link href="/auth/vendor/simplemde/simplemde.min.css" rel="stylesheet" type="text/css" />
    </x-slot>

    <div class="card rounded-0 shadow-lg">
        <div class="card-body">

            <form method="post" action="{{ route('panel.careers.save') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Job Title</label>
                    <input type="text" class="form-control input-bottom" name="title" value="{{ old('title') }}" placeholder="Enter job title" required>
                </div>

                <div class="mb-3">
                    <label>Campaign Image</label>
                    <input type="file" class="form-control input-bottom" name="image" required>
                </div>

                <div class="mb-3">
                    <label>Job Description</label>
                    <textarea class="form-control input-bottom" id="simplemde1" name="description" placeholder="Enter description" required>{{ old('description') }}</textarea>
                </div>

                <button class="btn btn-success rounded-0">Save Campaign</button>

            </form>

        </div>
    </div>

    <x-slot name="js">
        <script src="/auth/vendor/simplemde/simplemde.min.js"></script>
        <script>
            new SimpleMDE({ element: document.getElementById("simplemde1"), spellChecker: !1, placeholder: "Write something..", tabSize: 2, status: !1, autosave: { enabled: !1 } });
        </script>
    </x-slot>

</x-panel.dashboard>
