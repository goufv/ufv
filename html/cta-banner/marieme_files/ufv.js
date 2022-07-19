// Multi-level navigation - Anthony Lepki, 2015

$("ul.multilevel-linkul-0").each(function(a){$oi=$(this).html(),
	$(this).replaceWith('<span class="toggle-children"></span><ul class="multilevel-linkul-0" style="display: none;">'+$(this).html()),console.log($(this).html())}),
    
$(function(){
      $('.currentbranch1').parents('ul.multilevel-linkul-0').slideDown();
});   

$(document).ready(function()
	{
		$(".side-links .toggle-children").click(function()
				{	$(this).toggleClass("open").next().toggle("fast")		}
		)
				$(".side-links .toggle-children").mouseover(function()
				{	$(this).toggleClass("open").next().toggle("fast")		}
		)
});