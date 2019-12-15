
  	   $(document).ready(function()
        {
            $("#myFold ul li").next("ul").hide();
            $("#myFold ul li").click(function()
        {
            $(this).next("ul").toggle();
            });
            });
