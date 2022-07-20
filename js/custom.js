/**
 * Created by Black Joker on 7/31/2021.
 */
function delete_grade(element, id, event)
{
    event.preventDefault();
    if (confirm("Do you want to delete the grade with ID "+id+" ?"))
        if (confirm("Please confirm that you want to delete the grade with ID "+id+" ?"))
            window.location.href = $(element).data('route');
}

function delete_unit(element, id, event)
{
    event.preventDefault();
    if (confirm("Do you want to delete the unit with ID "+id+" ?"))
        if (confirm("Please confirm that you want to delete the unit with ID "+id+" ?"))
            window.location.href = $(element).data('route');
}

function delete_lesson(element, id, event)
{
    event.preventDefault();
    if (confirm("Do you want to delete the lesson with ID "+id+" ?"))
        if (confirm("Please confirm that you want to delete the lesson with ID "+id+" ?"))
            window.location.href = $(element).data('route');
}

function delete_section(element, id, event)
{
    event.preventDefault();
    if (confirm("Do you want to delete the section with ID "+id+" ?"))
        if (confirm("Please confirm that you want to delete the section with ID "+id+" ?"))
            window.location.href = $(element).data('route');
}

function delete_content(element, id, event)
{
    event.preventDefault();
    if (confirm("Do you want to delete the content with ID "+id+" ?"))
        if (confirm("Please confirm that you want to delete the content with ID "+id+" ?"))
            window.location.href = $(element).data('route');
}

$(document).ready( function () {
    // Setup - add a text input to each footer cell
    $('#data-table thead tr').clone(true).appendTo( '#data-table thead' );
    $('#data-table thead tr:eq(1) th:not(.no-search)').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" style="max-width: ' + (title.length+7) * 10 + 'px;" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    $('#data-table thead tr:eq(1) th.no-search').each( function (i) {
        $(this).html("");
    });
    var table = $('#data-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        bAutoWidth: false
    });
    $("select").selectpicker();
    $("#input-grade-lessons").on("change", function()
    {
        var chosenGrade = $(this).val();
        var options = [];
        var selectPicker = $("#input-unit-lessons");
        if (!selectedUnitID)
            selectedUnitID = 0;
        $.each( grades, function (index, element)
        {
            if (chosenGrade == element['id'])
            {
                element['units'].forEach(function (item) {
                    var option = "<option " + (selectedUnitID == item['id'] ? "selected" : "" ) + " value='"+item['id']+"' >" + item['unit'] + "</option>";
                    options.push(option);
                });
                selectPicker.html(options);
                selectPicker.selectpicker('refresh');
            }});
        })
    $("#input-unit-lessons").on("change", function()
    {
        var chosenUnit = $(this).val();
        var chosenGrade = $("#input-grade-lessons").val();
        var options = [];
        var selectPicker = $("#input-unit-lesson-sections");
        if (!selectedLessonID)
            selectedLessonID = 0;
        $.each( grades, function (index, element)
        {
            if (chosenGrade == element['id'])
            {
                element['units'].forEach(function (item) {
                    if (item['id'] == chosenUnit)
                    {
                        item['lessons'].forEach(function(itemLesson){
                            var option = "<option " + (selectedLessonID == itemLesson['id'] ? "selected" : "" ) + " value='"+itemLesson['id']+"' >" + itemLesson['lesson'] + "</option>";
                            options.push(option);
                        })
                        selectPicker.html(options);
                        selectPicker.selectpicker('refresh');
                    }
                });
            }});
    })
    $("#input-grade-lessons").trigger("change");
    $("#input-unit-lessons").trigger("change");

    $('.summernote-textarea').summernote({
        toolbar:[
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['font', ['fontname']],
            ['para', ['paragraph']],
            ['insert', ['link', 'picture', 'video', 'audio']],
            ['misc', ['codeview', 'fullscreen']],
        ],
        height: 400
    });

    $(".edit-content #input-contentType").on("change", function(){
        if ($(this).val()=="question")
        {
            $("#answerTypeRow").removeClass("hide");
            if ($("#input-answerType").val()=="text")
            {
                $("#textAnswersRow").removeClass("hide");
                $("#imageAnswersRow").addClass("hide");
            }
            else
            {
                $("#textAnswersRow").addClass("hide");
                $("#imageAnswersRow").removeClass("hide");
            }
        }
        else
        {
            $("#answerTypeRow").addClass("hide");
            $("#textAnswersRow").addClass("hide");
            $("#imageAnswersRow").addClass("hide");
        }
    })






})