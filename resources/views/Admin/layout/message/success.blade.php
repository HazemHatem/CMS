<script>
    var success = "{{ session('success') }}";
    if (success) {
        alert(success);
    }
</script>