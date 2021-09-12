@extends('layouts.app')
@section('content')

<form method="post" id="comment_form">
    <div class="form-group">
        <label for="">Enter Subject</label>
        <input type="text" name="subject" id="subject" class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Enter Comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Post" name="post" id="post" class="btn btn-info" />
    </div>
</form>

@endsection

@section('script')

<script>
    $(document).ready(function{
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                    $('.dropdown-menu').html(data.notification);
                    if(data.unseen_notification > 0)
                    {
                        $('.count').html(data.unseen_notification);
                    }
                }
            })
        }

        load_unseen_notification();

        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            if($('#subject').val() != '' && $('#comment').val() != '')
            {

                var form_data = $(this).serialize();
                $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data: form_data,
                    success:function(data)
                    {
                        $('#comment_form')[0].reset();
                        load_unseen_notification();
                    }
                })

            } else {

                alert("Both fields are required");

            }
        });
    });
</script>


@endsection