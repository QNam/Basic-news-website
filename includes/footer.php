
<div class="footer-container">
<footer class="docs-footer bg-333">
	<p><a href="https://github.com/QNam" class="text-light" target="_blank">GitHub</a> | 
		<a href="https://www.facebook.com/quocnam117" class="text-light" target="_blank">Facebook</a> | 
		
	</p>
	<p class="text-light">Designed and built by 
		<a href="https://www.facebook.com/quocnam117" target="_blank">Quốc Nam</a>		        	
	</p>
</footer>
</div>
	
</div>
</body>
</html>
<?php mysqli_close($conn);?>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
