<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    function province(){
        
                let province = $('#provinceid').val();
        
                $('#regencyShow').load('{{url("regency")}}/'+province, function(e) {});        
            }

    function regency(){
    
            let regency = $('#regencyid').val();
    
            $('#districtShow').load('{{url("district")}}/'+regency, function(e) {});        
        }
        
</script>