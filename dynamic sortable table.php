<?php
require "config_page.php";
$query=" SELECT * FROM data_books  ";
?>
<html lang="ar" dir="rtl">
<head>
 <meta charset="utf-8" >
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap-3.0.0/assets/js/html5shiv.js"></script>
      <script src="bootstrap-3.0.0/assets/js/respond.min.js"></script>
    <![endif]-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="bootstrap-3.0.0/assets/js/jquery.js"></script>
    <script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        
        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
    </script>
<style>
    .table-sortable tbody tr {
    cursor: move;
}
</style>
</head>
<body>
<div class="container">
    <div class="row clearfix">
    	<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-hover table-sortable" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							العنوان
						</th>
						<th class="text-center">
							رقم الايداع
						</th>
						<th class="text-center">
							الرقم الدولي
						</th>
    					<th class="text-center">
							عدد الصفحات
						</th>
        				<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
						</th>
					</tr>
				</thead>
				<tbody>
                                    <?php
                                    foreach ($dbo->query($query) as $row10) {
    				echo "<tr id='addr0' data-id='0' class='hidden'>";
                                    echo"  <td data-name='name'>$row10[books_name]</td>";
                                    echo"  <td data-name='mail'>$row10[BOOKID]</td>";
                                         echo" <td data-name='sel'>$row10[ISBN]</td>";
                                         echo" <td data-name='page' >$row10[no_page]</td>";
                                     echo "</tr>"; 
                                    }
			            ?>
					
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-default pull-right">Add Row</a>
</div>
</body>
</html>