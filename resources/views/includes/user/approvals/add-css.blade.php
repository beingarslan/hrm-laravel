@section('styles')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/quill/katex.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/quill/monokai-sublime.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/quill/quill.bubble.css')}}">
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
</style>
@endsection