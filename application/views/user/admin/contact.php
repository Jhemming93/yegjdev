<?php  
  



?>


<div class="container mt-25">
    <div class="row ">
        <?php $CI = &get_instance();
        $CI->load->view('componets/side_nav');
        ?>
        <div class="col s12 m9 offset-m1">
            <div class="row">
            <div class="col s12 m3 theme-box">
                <h5 class="theme-text-primary">Messages</h5>
                <div>
                    <?php foreach($results as $row): ?>
                        <?php $contact_id = $row->contact_id; ?>
                        <div class="p-1 m-1 <?php if($row->message_read === "0"){
                            echo "theme-bg-primary white-text theme-box";
                        }else{
                            echo 'theme-box';
                        } ?> message" id="contact-<?php echo $contact_id;?>" data-id="<?php echo $contact_id; ?>">
                            <h5><?php echo $row->subject; ?></h5>
                            <p><?php echo $row->name; ?></p>
                        </div>

                     <?php endforeach; ?>   
                </div>
            </div>
            <div class="col s12 m9">
                    <div id="message-notselected" ><h2>No Message Selected</h2></div>
                     <div id="message-selected" class="hide">
                            <div>
                            <h3 id="subject"></h3>
                            <p>From: <span id="name"></span></p>
                            <p>Sender Email: <span id="sender"></span></p>
                            <p>Date-recieved: <span id="date"></span></p>    
                            </div>
                            <div>
                                <h4>Message</h4>
                                <p id="mymessage"></p>
                            </div>
                           </div>
                            
                  

            </div>
        </div>
        </div>
    </div>
</div>



<script>

$('document').ready(()=>{




    
    $('.message').click(function(){

        var message_id = $(this).data('id');

        $.ajax({
            url: `<?php echo base_url() . "admin/contact_message"?>`,
            method: "POST",
            data: {contact_id: message_id},
            dataType: 'json', 
            success: function(data){
                var len = data.length;
                $("#subject", "#name", "#sender", "#date", "#mymessage").text("");
                if(len>0){
                    var mSubject = data[0].subject;
                    var mName = data[0].name;
                    var mMessage = data[0].message;
                    var mFrom = data[0].contact_sender;
                    var mRecieved = data[0].sent_when;
                    var mRead = data[0].message_read;

                    $('#message-notselected').addClass('hide');
                    $('#message-selected').removeClass('hide');

                    $('#subject').text(mSubject);
                    $('#name').text(mName);
                    $('#sender').text(mFrom);
                    $('#date').text(mRecieved);
                    $("#mymessage").text(mMessage);
                    if(mRead === "1"){
                        $(`#contact-${message_id}`).removeClass('theme-bg-primary white-text')
                    }

                }
            }
        })

    })

})

</script>   