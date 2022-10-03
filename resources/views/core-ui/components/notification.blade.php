<script>
    Swal.fire({
        position: 'top-end',
        icon: '<?php echo $status; ?>',
        title: '<?php echo $message; ?>',
        showConfirmButton: false,
        timer: 1500
    })
</script>
