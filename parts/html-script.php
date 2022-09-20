<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js
    "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    fetch('./cart-api/proCart.php')
            .then(r => r.json())
            .then(function(data){
                count(data)
                console.log(data)
            });
            
    function count(data) {
        let total = 0;
        for (let i in data) {
            total += data[i].qty;
        }
        document.querySelector('.badge').textContent = total;
    }
</script>