@push('javascript')
    <script src='{{ asset('pdfobject/pdfobject.min.js') }}'></script>
    <script>
        $(function () {
            var baseSrc = "{{route('voyager.dashboard')}}/viewer-preview";
            var options = {
                pdfOpenParams: {toolbar: '0', navpanes: '0'}
            };

            var dataJenis, dataId, dataNo;

            $(".tampilkan").click(function (e) {
                $("#modal-file-dokumen").text('');
                dataJenis = $(this).data('jenis');
                dataId = $(this).data('id');
                dataNo = $(this).data('no');
                $("#modal-title-dokumen").text(dataNo);

                $.when(dataJenis, dataId).done(function (dataJenis, dataId) {
                    if (dataJenis && dataId) {
                        var pdfLink = baseSrc + '/' + dataJenis + '/' + dataId;
                        PDFObject.embed(pdfLink, "#modal-file-dokumen", options);
                    } else {
                        $("#modal-file-dokumen").text('Network error. Try again!');
                    }
                });
            });
        });
    </script>
@endpush