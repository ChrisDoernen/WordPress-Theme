(function($){
    $(document).on("click", '.copy-to-clipboard', function() {
        var element = this;
        var copyTarget = element.getAttribute('data-cal');
        var msgTarget = element.getAttribute('data-msg');
        copyToClipboardMsg(document.getElementById(copyTarget), document.getElementById(msgTarget));
        return false;
    });
    
    function copyToClipboardMsg(elem, msgElem) {
    	var succeed = copyToClipboard(elem);
        var msg;
        var msg2;
        var link = $('.msgElem').attr('data-link');
        if (!succeed) {
            msg = "<i class='fa fa-times-circle' style='color: red;'></i> Es ist ein Fehler aufgetreten. Bitte manuell kopieren.";
        } else {
            msg = "<i class='fa fa-check-circle' style='color: green;'></i> Der Link wurde in die Zwischenablage kopiert.";
        }
        if (typeof msgElem === "string") {
            msgElem = document.getElementById(msgElem);
        }
        msgElem.innerHTML = msg;
        elem.style.display = 'none';
        msgElem.style.opacity = 1;
        setTimeout(function() {
            msgElem.style.opacity = 0;
            msgElem.innerHTML = '';
            elem.style.display = 'inline-block';
        }, 2000);
    }
    
    function copyToClipboard(elem) {
    	  // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);
        
        // copy the selection
        var succeed;
        try {
        	  succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }
        
        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
    
    $(".note-close").click(
        function () {
            $("#calendar-note").addClass("hide");
    });
    
    $(".calendar__menu-trigger").click(
        function () {
            $(".calendar__menu-overlay").toggleClass("hide");
            if($(".menu-icon").hasClass("fa-bars")) 
            {
                $(".menu-icon").removeClass("fa-bars");
                $(".menu-icon").addClass("fa-times");
            }
            else
            {
                $(".menu-icon").removeClass("fa-times"); 
                $(".menu-icon").addClass("fa-bars");
            }
    });

    $('.slider').each(function () {
        var $this = $(this);
        $this.on("click", function () {
            var calendar = '.' + $(this).data('cal');
            var selector = "div.event" + calendar;
            $(selector).toggleClass("hide");
        });
    });

    $( document ).ready(function() {
        $( 'a.url' ).each(function () {
            var href = $( this ).attr('href');
            if (href == 'https://churchdb.arche-augsburg.de/?q=churchcal' ) {
                var html = $( this ).html();
                $( this ).replaceWith( html );
            }
        });
    });

})(jQuery);  
