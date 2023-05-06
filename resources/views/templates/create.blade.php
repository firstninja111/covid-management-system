@extends('layouts.template')

@section('title','Create Template')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.create_template')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('test.index')}}">{{__('app.pdf_templates')}}</a></li>
              <li class="breadcrumb-item active">{{__('app.create')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <!-- <iframe src="./pdfjs/web/viewer.html#zoom=90&navpanes=0&toolbar=0?file=public/results/report_.pdf" height="100%;" width="100%;"></iframe> -->

                      <div style="text-align:center">
                        <iframe id="previewIframe" src="https://docs.google.com/viewer?url=https://visionboardcontrol.com/public/results/dummy.pdf&embedded=true" frameborder="0" height="1100" width="100%"></iframe>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  @include('layouts.includes.alerts')
                  <form class="form-horizontal" method="POST" action="{{route('pdf_template.store')}}">
                      @csrf
                    <!-- Test Type Details -->
                      <div class="card h-100">
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 mb-2">
                                <h5 class="pull-right">{{__('app.template_detail')}}</h5>
                                <hr class="my-4">
                              </div>
                                <hr>
                              <input type="text" name="templateId" class="form-control" value="0" id="templateId" hidden>

                              <div class="col-md-12">
                                <div class="form-row mb-2">
                                  <div class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.template_name')}}</label>
                                      <input type="text" name="name" value="{{old('name')}}" placeholder="{{__('app.template_name')}}" class="form-control" id="name" required>
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="mb-2">
                                  <label for="result_type" class="mb-1">{{__('app.result_type')}}</label>
                                  <div class="d-flex" id="result_type_group">
                                    <input type="radio" name="result_type" value="Positive/Negative" id="result_type1" style="width: 30px; height:16px; margin-top:5px;" checked>
                                    <label for="result_type1" class="form-check-label mb-1" style="font-size:16px; margin-right: 20px;">Positive/Negative</label>

                                    <input type="radio" name="result_type" value="Number/Score" id="result_type2" style="width: 30px; height:16px; margin-top:5px;">
                                    <label for="result_type2" class="form-check-label mb-1" style="font-size:16px">Number/Score</label>

                                    @error('result_type')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-2" id="result_type_section">
                                  <div class="col-sm-4">
                                      <label for="positive_display" class="mb-1">{{__('app.positive_display')}}</label>
                                      <input type="text" name="positive_display" value="{{old('positive_display')}}" placeholder="non-reactive (Negative)" class="form-control" id="positive_display">
                                      @error('positive_display')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-sm-4">
                                     <label for="negative_display" class="mb-1">{{__('app.negative_display')}}</label>
                                      <input type="text" name="negative_display" value="{{old('negative_display')}}" placeholder="reactive (Preliminary Positive)" class="form-control" id="negative_display">
                                      @error('negative_display')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-sm-4">
                                     <label for="inconclusive_display" class="mb-1">{{__('app.inconclusive_display')}}</label>
                                      <input type="text" name="inconclusive_display" value="{{old('inconclusive_display')}}" placeholder="pending (Inconclusive)" class="form-control" id="inconclusive_display">
                                      @error('inconclusive_display')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-2">
                                  <div class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.result_interpretation')}}</label>
                                     <textarea id="description" name="description"></textarea>
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <div class="d-flex">
                                    <input type="checkbox" name="qr_code" id="qr_code" style="width: 30px; height:16px; margin-top:5px;" checked>
                                    <label for="qr_code" class="form-check-label mb-1" style="font-size:16px; margin-right: 20px;">Display QR Code</label>
                                  </div>
                                </div>
                                <div class="form-row mb-2">
                                  <div class="col-sm-6">
                                    <button id="preview" type="button" class="btn btn-primary col-md-12">{{__('app.preview')}}</button>
                                  </div>
                                  <div class="col-sm-6">
                                    <button type="button_submit" class="btn btn-danger col-md-12">{{__('app.save')}}</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                    <!-- Test Type Details -->
                  </form>
                  <!-- form end -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="block-ui clear">
      <div class="loading-info">
        <div class="loading-text loading">
          <div class="text" style="font-size: 16px;"> Generating PDF ...</div>
          <div class="loader" role="progressbar">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {    
    console.log('abc');
    $('#description').summernote({
      placeholder: 'Result Interpretation Content',
      height: 600,
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['height', ['height']]
      ]
    });
    $('#description').css('font-size','14px');


    $("input[name='result_type']").change(function(){
          console.log($(this).val())
          var result_type = $(this).val();
          if(result_type == "Positive/Negative"){
            $("#result_type_section").show();
          }
          else{
            $("#result_type_section").hide();
          }
      });
  });  

  $("#button_submit").click(function(){
    $('.block-ui').removeClass('clear');
  })


  $("#preview").click(function(){
    console.log($("#description").summernote('code'));

    if($("#name").val() == ''){
      alert("Please input template name");
      return;
    }
    else if($("#result_type1")[0].checked == true && ($("#positive_display").val() == '' || $("#negative_display").val() == '') || $("#inconclusive_display").val() == '')
    {
      alert("Please input positve display and negative display");
      return;
    }

    $('#blockAppliactionDialog').modal({
            backdrop: 'static',
            keyboard: false
        });

    $('.block-ui').removeClass('clear');

    var param = {
        templateId: $("#templateId").val(),
        name : $("#name").val(),
        result_type : $("#result_type1")[0].checked == true ? 'Positive/Negative' : 'Number/Score',
        positive_display : $("#positive_display").val(),
        negative_display : $("#negative_display").val(),
        inconclusive_display : $("#inconclusive_display").val(),
        description : $("#description").summernote('code'),
        qr_code: $('#qr_code')[0].checked == true ? 1 : 0,
      };
    $.ajax({
          url: "{{URL::to('/pdf_template/preview')}}",
          type: 'POST',
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify(param),
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (result) {
              console.log(result);
              $("#templateId").val(result.id);
              var iframe = document.getElementById('previewIframe');
              iframe.src = result.preview_url;

              $('.block-ui').addClass('clear');
          },
      });
  });
</script>
@endsection