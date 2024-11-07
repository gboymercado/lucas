<?php
  $pageContent = "contentPages/contentBreadMakingClass.php";
  include("templates/template.php");
?>
<script type="text/javascript">
  setPageTitle("Bread Making Class");
  

  const thisSection = document.querySelector(".breadMakingClassPromo");

let  imageContainer  = createContainerImage("images/photo3.webp")
    ,textContainer = createContainerText({
                   h3:"BREAD MAKING CLASS"
                  ,ul:["Learn how to bake your own bread with Luca's Loaves Bakery head baker. In each two hour lesson we’ll take you through the whole process, turning handfuls of flour into your own warm, crusty loaves."
                      ,"Class starts at $350 plus GST"
                      ,"9 am to 5pm on first Saturday of every month"
                      ,"Lunch is provided on site."]
                  ,input:{type:"submit"
                         ,class:"btn btn-dark col-4 my-2"
                         ,role:"button"
                         ,value:"JOIN NOW!"
                         ,name:"JOIN_CLASS"}
                 });
container = createContainerWithTwoColumns(imageContainer, textContainer);
thisSection.appendChild(container);//about us class container

</script>
