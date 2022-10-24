<?php

use Latte\Runtime as LR;

/** source: /var/www/html/templates/Admin/_parts/script.latte */
final class Template5a6279b0bb extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<script type="text/javascript">
$(document).ready(function () {
    f_MenuMobileCollapse();
    f_MenuToggle();
    f_MenuCollapse();
    f_ItemRemove();
            
    if ($(\'#frm-postForm-categories\').length > 0) {
        new SlimSelect({
          select: \'#frm-postForm-categories\',
          showSearch: true
        })
    }
    
    $("#flexSwitchSubCat").change(function() {
        var checked = $(this).prop(\'checked\');
        
        if (!checked)
            $("#subcat").removeClass(\'d-none\');
        else
            $("#subcat").addClass(\'d-none\');
    })
    
    if ($("#post-image-temp").length > 0) {
        var filesToUpload = [];
        var files1Uploader = $("#post-image-temp").fileUploader(filesToUpload, "files");
        $( ".fileList" ).sortable({
            update: function( event, ui ) { files1Uploader.sortCommit() }
        });
        $( ".fileList > *" ).disableSelection();
    }
    
    f_mediaFileEdit();
})


$(function () {
    $.nette.init();

    tinymce.init({
        selector: \'.tinymce\',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
		toolbar: \'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link\',
    });
    
    $(".pwdreload").click(function() {
        $.nette.ajax ({
            type: "POST", 
            data: {\'count\': $(this).attr("data-char")},
            url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("pwdreload!")) /* line 54 */;
		echo '
        }).done(function() {
            $("#frm-userForm-password").val($(".newpwdreloadede").text());
            $(".newpwdreloadede").text(\'\')
        });
    })                              
    
    $.nette.ext(\'bs-modal\', {
        before: function (xhr, settings) {
            //document.getElementById(\'loader\').classList.remove(\'fadeOut\');
    	},
        
		init: function() {
			// if the modal has some content, show it when page is loaded
			var $modal = $(\'#modal\');
			if ($modal.find(\'.modal-content\').html().trim().length !== 0) {
				$modal.modal(\'show\');
			}
		},
        
		success: function (jqXHR, status, settings) {
            if (typeof settings.responseJSON === \'undefined\')
                return;
                
			if (typeof settings.responseJSON.snippets != \'undefined\') {
				var $snippet_modal = settings.responseJSON.snippets[\'snippet--modal\'];
                var $snippet_featureimage = settings.responseJSON.snippets[\'snippet--featureimage\'];
                var $snippet_gallery = settings.responseJSON.snippets[\'snippet--gallery\'];
                var $snippet_newpassword = settings.responseJSON.snippets[\'snippet--newpassword\'];
                var $snippet_authform = settings.responseJSON.snippets[\'snippet--authform\'];
			}
            
            if ($snippet_modal) {
    			var $modal = $(\'#modal\');
                
    			if ($modal.find(\'.modal-content\').html().trim().length !== 0) {
    				$modal.modal(\'show\');
    			} else {
    				$modal.modal(\'hide\');
    			}
                
                var isGallery = $(".modal-gallery-class").length > 0;
                var isFeature = $(".modal-edit-class").length > 0;
                
                $(".media-image").each(function() {
                    var id = $(this).find(\'img\').attr(\'data-id\');
                    
                    if (isFeature || isGallery && $(".gallery-control").val().indexOf(\',\' + id + \',\') == -1) {
                        $(this).removeClass(\'opacity-25\');
                        $(this).click(function() {
                            $(".media-image").removeClass(\'btn-warning\');
                            $(this).addClass(\'btn-warning\');
                            var img = $(this).find(\'img\').attr(\'src\');
                        })
                    } else {
                        $(this).addClass(\'opacity-25\');
                    }
                })
                
                $(".modal-header .close").click(function() {
                    $modal.modal(\'hide\');
                })
                
                $(".modal-edit-class .media-close").click(function() {
                    var val = $(\'.media-image.btn-warning\').find(\'img\').attr("data-id");
                    var img = $(\'.media-image.btn-warning\').find(\'img\').attr("src");
                    
                    if (typeof val !== \'undefined\') {
                        $.nette.ajax({
                            type: "POST", 
                            data: {\'id\': val, \'src\': img},
                            url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("addFeatureImage!")) /* line 125 */;
		echo '
                        }).done(function() {
                            $(".future-image-id").val(val);
                            $modal.modal(\'hide\');
                        });                                                
                    }
                })
            }
            
            if ($snippet_authform) {
                console.log("$snippet_authform")
            }
            
            loader();
		}
	});
});
console.log(1)

function f_MenuCollapse(start = true) {
    var collapsed =  start ? 2 : ($("body").hasClass(\'is-collapsed\') ? 0 : 1);
    
    $.nette.ajax({
        type: \'POST\',
        url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("panelCollapsed!")) /* line 149 */;
		echo ',
        data: {\'collapsed\': collapsed}
        //dataType: \'json\',
    }).done(function(response){
        if (response == "1") {
            $("body").addClass(\'is-collapsed\');
        } else {
            $("body").removeClass(\'is-collapsed\');
        }
    })
}

function f_MenuMobileCollapse() {
    if ($(window).width() < 760) {
        $("body").addClass(\'is-collapsed\');
    } else {
        f_MenuCollapse();
    }
}

function f_MenuToggle() {
    $(".nav-item.dropdown").click(function(){
        $(this).find(".dropdown-nav-menu").toggle()
    })
}
console.log("remove")
function f_ItemRemove() {
    $(".item-remove").each(function(){
        $(this).click(function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            
            if (confirm(\'Are you sure you want to delete this item?\')) {
                $.nette.ajax({
                    type: \'GET\',
                    url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("remove!")) /* line 184 */;
		echo ',
                    data: {\'pid\': id },
                }).done(function(response) {
                    f_ItemRemove();
                }).fail(function(response) {
                    f_ItemRemove();
                })
            }   
        }); 
    })
}

var mediaFile = null;
var extension = null;
function f_mediaFileEdit() {
    $(".media-name").each(function() {
        $(this).click(function(e) {
            //clickOut(e)
            var type = $(this);
                        
            if ($(this).find("input").length == 0) {
                var file = $(this).find("span").text();
                extension = file.substr( (file.lastIndexOf(\'.\')) );
                $("<input />")
                    .val(file.replace(extension, ""))
                    .prependTo($(this))
                    .keydown(function(e){
                        if (e.keyCode == 13) {
                            e.preventDefault();
                          }
                    }).focus();
                
                mediaFile = type.find("input");
                $(this).find("span").hide();
            }
        })
    })
    
    $(document).mouseup(function(e) {
        clickMediaOut(e)
    })
    function clickMediaOut(e) {
        var container = mediaFile;
    
        // if the target of the click isn\'t the container nor a descendant of the container
        if (typeof mediaFile !== "undefined" && mediaFile !== null && !container.is(e.target) && container.has(e.target).length === 0) 
        {
            var value = container.val();
            var uid = mediaFile.parent().attr("data-id");
            mediaFile = null;
            
            $.nette.ajax({
                type: \'POST\',
                url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("mediafilerename!")) /* line 237 */;
		echo ',
                data: {\'uid\': uid, \'value\': value + extension },
                dataType: \'json\'
            }).done(function(response) {
                if (response.error) {
                    alert(response.message);
                    container.parent().find("span").show();
                } else {
                    container.parent().find("span").text(value + extension).show();
                }
                container.remove();
                
            }).fail(function(response) {
                console.log(response);
                alert(response.message)
                container.parent().find("span").show();
                container.remove();
            })
        }
    }
}

function f_removeFeatureImage() {
    $(\'.future-image-remove\').click(function(event){
        event.preventDefault();
        var id = $(this).attr("data-id");
        var href = $(this).attr(\'href\') + "&id=" + id;
        
        $(this).attr(\'href\', href);
        $(".future-image-id").val(0)
    })
}

document.addEventListener(\'DOMContentLoaded\', ()=>{
    copyToClipboard(".merge-tag");
    
})
function copyToClipboard(element) {
    $(element).click(function(event) {
        event.preventDefault();
        
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).attr("href")).select();
        document.execCommand("copy");
        $temp.remove();
    })
}
function f_MenuCollapse(start = true) {
    //$("body.app").toggleClass(\'is-collapsed\');  
    var collapsed =  start ? 2 : ($("body").hasClass(\'is-collapsed\') ? 0 : 1);
    
    $.nette.ajax({
        type: \'POST\',
        url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("panelCollapsed!")) /* line 291 */;
		echo ',
        data: {\'collapsed\': collapsed}
        //dataType: \'json\',
    }).done(function(response){
        if (response == "1") {
            $("body").addClass(\'is-collapsed\');
        } else {
            $("body").removeClass(\'is-collapsed\');
        }
    })  
}

$.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;
    var self = this;
    
    this.removeLink =  function(fileId) {
        return "<a class=\\"removeFile\\" href=\\"#\\" data-fileid=\\"" + fileId + "\\">Odstranit</a>";
    }
    
    this.init = async function() {
        
';
		if (isset($uploads)) /* line 313 */ {
			$iterations = 0;
			foreach ($uploads as $upload) /* line 314 */ {
				echo '            var url = ';
				echo LR\Filters::escapeJs($upload->getUrl()) /* line 315 */;
				echo '
            var title = ';
				echo LR\Filters::escapeJs($upload->getFilename()) /* line 316 */;
				echo '
            
            fileIdCounter++;
            var fileId = sectionIdentifier + fileIdCounter;
                
            await fetch(url)
                .then((res) => res.blob())
                .then((myBlob) => {
                    const myFile = new File([myBlob], title, {
                        type: myBlob.type,
                    });
                    
                    $(\'.fileList\').append(
                        "<div class=\'col-md-3 ui-state-default\'><div class=\'file-wrapper\'><span class=\'file-move\'><i class=\'fas fa-expand-arrows-alt\'></i></span><div class=\'file-target\'  data-name=\'" + myFile.name + "\'><img src=\'"+url+"\'/></div>"
                        + "<div class=\'file-title\'>" + myFile.name + "</div>" 
                         + self.removeLink(fileId) + "</div></div>");
                    
                    // logs: Blob { size: 1024, type: "image/jpeg" }
                    
                    filesToUpload.push({
                        id: fileId,
                        file: myFile
                    });
                    
                    myFile.state = \'old\';
                    
                    self.removeFile();
                    self.commit();
                });
';
				$iterations++;
			}
		}
		echo '    }
    self.init()
    
    this.closest(".files").change(function (evt) {
        var output = [];
        var files = evt.target.files;
        var j = 1;
        var repeatIndex = [];
        
        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var fileId = sectionIdentifier + fileIdCounter;
            var file = evt.target.files[i];
            
            var fileExists = false;
            
            for (var k = 0; k < filesToUpload.length; ++k) {
                if (filesToUpload[k].file.name === file.name) {
                    fileExists = true;
                    repeatIndex.push(i);
                }
            }
            
            if (fileExists)
                continue;
            

            file.state = \'new\';
            
            var fileReader = new FileReader();
            fileReader.onload = async function (event) {
                
                if ( $.inArray(j, repeatIndex) == -1 ) {
                    var newImage = await self.resizebase64(event.target.result, 1920, 1920);
                    
                    await fetch(newImage)
                        .then((res) => res.blob())
                        .then((myBlob) => {
                            const myFile = new File([myBlob], evt.target.files[j-1].name, {
                                type: myBlob.type,
                            });
                            
                            filesToUpload.push({
                                id: fileId,
                                file: myFile
                            });
                        })
                    
                    $(\'.fileList\').append(
                        "<div class=\'col-md-3\'><div class=\'file-wrapper\'><span class=\'file-move\'><i class=\'fas fa-expand-arrows-alt\'></i></span><div class=\'file-target\' data-name=\'" + evt.target.files[j-1].name + "\'><img src=\'"+newImage+"\'/></div>"
                        + "<div class=\'file-title\'>" + evt.target.files[j-1].name + "</div>" 
                         + self.removeLink(fileId) + "</div></div>");
                }
                    
                if (j == files.length) {
                    self.removeFile();
                    self.commit();
                    evt.target.value = null;
                }                                                            
                
                j++;
            };
            fileReader.readAsDataURL(evt.target.files[i]);
        };        
    });
    

    this.removeFile = function() {
        $(".removeFile").each(function() {
            $(this).on("click", function (e) {
                e.preventDefault();
        
                var fileId = $(this).parent().children("a").data("fileid");
        
                for (var i = 0; i < filesToUpload.length; ++i) {
                    if (filesToUpload[i].id === fileId)
                        filesToUpload.splice(i, 1);
                }
        
                self.commit();
                $(this).parent().parent().remove();
            });
        });
    }
    
    this.commit = function () {
        var dataTransfer = new DataTransfer()

        for(var i = 0; i < filesToUpload.length; i++) {
            dataTransfer.items.add(filesToUpload[i].file);
        }
        $("#post-image").get(0).files = dataTransfer.files
    }
    
    this.sortCommit = function () {
        var dataTransfer = new DataTransfer()

        $(".fileList .file-target").each(function() {
            var name = $(this).attr(\'data-name\');
            
            for(var i = 0; i < filesToUpload.length; i++) {
                if (name == filesToUpload[i].file.name)
                    dataTransfer.items.add(filesToUpload[i].file);
            }
        })
        
        $("#post-image").get(0).files = dataTransfer.files
    }

    this.resizebase64 = function(imgBase64, maxWidth, maxHeight){
    
        return new Promise((resolve, reject) => {
    
            // Create and initialize two canvas
            var canvas 			= document.createElement("canvas");
            var ctx 			= canvas.getContext("2d");
            var canvasCopy 		= document.createElement("canvas");
            var copyContext 	= canvasCopy.getContext("2d");
    
            // Create original image
            var img = new Image();
            img.src = imgBase64;
    
            img.onload = () => {
                // Determine new ratio based on max size
                var ratio = 1;
                if(img.width > maxWidth)
                ratio = maxWidth / img.width;
                else if(img.height > maxHeight)
                ratio = maxHeight / img.height;
                
                // Draw original image in second canvas
                canvasCopy.width 	= img.width;
                canvasCopy.height 	= img.height;
                copyContext.drawImage(img, 0, 0);
    
                // Copy and resize second canvas to first canvas
                canvas.width 	= img.width * ratio;
                canvas.height 	= img.height * ratio;
    
                ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
    
                resolve(canvas.toDataURL("image/jpeg"));
            };
    
            img.onerror = reject;
    
        });
    
    }

    return this;
};
</script>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['upload' => '314'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
