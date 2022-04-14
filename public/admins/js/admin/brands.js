$(document).ready(function(){
    $('.btnDelete').on('click', function(){
      let self = $(this); // lấy ra element đang được chọn
      if(confirm('Ban co chac xoa?')){
        // lấy ra data
        let brandId = self.data('id');
        // check data
        if($.isNumeric(brandId)){
          $.ajax({
            url: urlDelBrand,
            data: {
              id: brandId
            },
            method: 'POST',
            beforeSend : function() {
              self.text('Loading...').parent().width('150px');
            },
            success : function(result) {
              if(result == 'success') {
                alert(result);
                window.location.reload();
                self.text('Delete').parent().width('140px');
              }
            }
          });
        }
      }
    });

    $('.isActive').on('click', function(){
        let self = $(this);
        let id = self.data('id');
        id = $.isNumeric(id) && id > 0 ? id : 0;
        let status = self.attr('data-status');
        status = status == 0 || status == 1 ? status : -1;

        if(id > 0 && status > -1){
            // console.log('id:' + id, 'status: ' + status); // rất quan trọng điểm test giá trị
            $.ajax({
                url : IsActiveBrand,
                data : {
                    brandId: id,
                    brandStatus : status
                },
                type : 'POST',
                beforeSend : function() {
                    self.text('Loading...');
                },
                success : function(data) {
                    let dt = JSON.parse(data);
                    if(dt.state === 'success') {
                        if(dt.status === "1"){
                            self.attr('data-status', 0)
                            .text('Actived')
                            .removeClass('btn-default')
                            .addClass('btn-secondary');
                        }else{
                            self.attr('data-status', 1)
                            .text('Deactive')
                            .removeClass('btn-secondary')
                            .addClass('btn-default');
                        }
                    }
                }
            });
        }
        return false;
    });
    
  });