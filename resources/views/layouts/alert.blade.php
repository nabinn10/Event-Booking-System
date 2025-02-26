@if(Session::has('success'))
<div class="fixed right-0 top-2 left-0 text-center z-50" id="alert">
    <span class="bg-green-600 px-10 py-3 text-white text-xl rounded-lg">{{session('success')}}</span>
</div>
<script>
    $msg = document.getElementById('alert');
    setTimeout(() => {
        $msg.style.top = '-100px';
        $msg.style.transition = '0.5s';
    }, 2000);
</script>
@endif
