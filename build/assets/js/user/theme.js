// Register onpaste on inputs and textareas in browsers that don't
// natively support it.
(function () {
    var onload = window.onload;

    window.onload = function () {
        if (typeof onload == "function") {
            onload.apply(this, arguments);
        }

        var fields = [];
        var inputs = document.getElementsByTagName("input");
        var textareas = document.getElementsByTagName("textarea");

        for (var i = 0; i < inputs.length; i++) {
            fields.push(inputs[i]);
        }

        for (var i = 0; i < textareas.length; i++) {
            fields.push(textareas[i]);
        }

        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];

            if (typeof field.onpaste != "function" && !!field.getAttribute("onpaste")) {
                field.onpaste = eval("(function () { " + field.getAttribute("onpaste") + " })");
            }

            if (typeof field.onpaste == "function") {
                var oninput = field.oninput;

                field.oninput = function () {
                    if (typeof oninput == "function") {
                        oninput.apply(this, arguments);
                    }

                    if (typeof this.previousValue == "undefined") {
                        this.previousValue = this.value;
                    }

                    var pasted = (Math.abs(this.previousValue.length - this.value.length) > 1 && this.value != "");

                    if (pasted && !this.onpaste.apply(this, arguments)) {
                        this.value = this.previousValue;
                    }

                    this.previousValue = this.value;
                };

                if (field.addEventListener) {
                    field.addEventListener("input", field.oninput, false);
                } else if (field.attachEvent) {
                    field.attachEvent("oninput", field.oninput);
                }
            }
        }
    }
})();
(function($) {

    // Initialise Datepicker
    $(document).ready(function () {
    
        $('.member-since').datepicker({
        dateFormat : 'yy-mm-dd'
        });

        // Initialise Owl Carousel
        $(".owl-carousel").owlCarousel({
            items: 1,
            autoplay: true,
            autoplaySpeed: 3000
        });

    });


})( jQuery );
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImRpc2FibGUtcGFzdGUuanMiLCJ0aGVtZS5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDMURBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoidGhlbWUuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBSZWdpc3RlciBvbnBhc3RlIG9uIGlucHV0cyBhbmQgdGV4dGFyZWFzIGluIGJyb3dzZXJzIHRoYXQgZG9uJ3Rcbi8vIG5hdGl2ZWx5IHN1cHBvcnQgaXQuXG4oZnVuY3Rpb24gKCkge1xuICAgIHZhciBvbmxvYWQgPSB3aW5kb3cub25sb2FkO1xuXG4gICAgd2luZG93Lm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaWYgKHR5cGVvZiBvbmxvYWQgPT0gXCJmdW5jdGlvblwiKSB7XG4gICAgICAgICAgICBvbmxvYWQuYXBwbHkodGhpcywgYXJndW1lbnRzKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHZhciBmaWVsZHMgPSBbXTtcbiAgICAgICAgdmFyIGlucHV0cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiaW5wdXRcIik7XG4gICAgICAgIHZhciB0ZXh0YXJlYXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5VGFnTmFtZShcInRleHRhcmVhXCIpO1xuXG4gICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgaW5wdXRzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICBmaWVsZHMucHVzaChpbnB1dHNbaV0pO1xuICAgICAgICB9XG5cbiAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCB0ZXh0YXJlYXMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgICAgIGZpZWxkcy5wdXNoKHRleHRhcmVhc1tpXSk7XG4gICAgICAgIH1cblxuICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGZpZWxkcy5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgdmFyIGZpZWxkID0gZmllbGRzW2ldO1xuXG4gICAgICAgICAgICBpZiAodHlwZW9mIGZpZWxkLm9ucGFzdGUgIT0gXCJmdW5jdGlvblwiICYmICEhZmllbGQuZ2V0QXR0cmlidXRlKFwib25wYXN0ZVwiKSkge1xuICAgICAgICAgICAgICAgIGZpZWxkLm9ucGFzdGUgPSBldmFsKFwiKGZ1bmN0aW9uICgpIHsgXCIgKyBmaWVsZC5nZXRBdHRyaWJ1dGUoXCJvbnBhc3RlXCIpICsgXCIgfSlcIik7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmICh0eXBlb2YgZmllbGQub25wYXN0ZSA9PSBcImZ1bmN0aW9uXCIpIHtcbiAgICAgICAgICAgICAgICB2YXIgb25pbnB1dCA9IGZpZWxkLm9uaW5wdXQ7XG5cbiAgICAgICAgICAgICAgICBmaWVsZC5vbmlucHV0ID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIG9uaW5wdXQgPT0gXCJmdW5jdGlvblwiKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBvbmlucHV0LmFwcGx5KHRoaXMsIGFyZ3VtZW50cyk7XG4gICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIHRoaXMucHJldmlvdXNWYWx1ZSA9PSBcInVuZGVmaW5lZFwiKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnByZXZpb3VzVmFsdWUgPSB0aGlzLnZhbHVlO1xuICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgdmFyIHBhc3RlZCA9IChNYXRoLmFicyh0aGlzLnByZXZpb3VzVmFsdWUubGVuZ3RoIC0gdGhpcy52YWx1ZS5sZW5ndGgpID4gMSAmJiB0aGlzLnZhbHVlICE9IFwiXCIpO1xuXG4gICAgICAgICAgICAgICAgICAgIGlmIChwYXN0ZWQgJiYgIXRoaXMub25wYXN0ZS5hcHBseSh0aGlzLCBhcmd1bWVudHMpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnZhbHVlID0gdGhpcy5wcmV2aW91c1ZhbHVlO1xuICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgdGhpcy5wcmV2aW91c1ZhbHVlID0gdGhpcy52YWx1ZTtcbiAgICAgICAgICAgICAgICB9O1xuXG4gICAgICAgICAgICAgICAgaWYgKGZpZWxkLmFkZEV2ZW50TGlzdGVuZXIpIHtcbiAgICAgICAgICAgICAgICAgICAgZmllbGQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsIGZpZWxkLm9uaW5wdXQsIGZhbHNlKTtcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKGZpZWxkLmF0dGFjaEV2ZW50KSB7XG4gICAgICAgICAgICAgICAgICAgIGZpZWxkLmF0dGFjaEV2ZW50KFwib25pbnB1dFwiLCBmaWVsZC5vbmlucHV0KTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG59KSgpOyIsIihmdW5jdGlvbigkKSB7XG5cbiAgICAvLyBJbml0aWFsaXNlIERhdGVwaWNrZXJcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgXG4gICAgICAgICQoJy5tZW1iZXItc2luY2UnKS5kYXRlcGlja2VyKHtcbiAgICAgICAgZGF0ZUZvcm1hdCA6ICd5eS1tbS1kZCdcbiAgICAgICAgfSk7XG5cbiAgICAgICAgLy8gSW5pdGlhbGlzZSBPd2wgQ2Fyb3VzZWxcbiAgICAgICAgJChcIi5vd2wtY2Fyb3VzZWxcIikub3dsQ2Fyb3VzZWwoe1xuICAgICAgICAgICAgaXRlbXM6IDEsXG4gICAgICAgICAgICBhdXRvcGxheTogdHJ1ZSxcbiAgICAgICAgICAgIGF1dG9wbGF5U3BlZWQ6IDMwMDBcbiAgICAgICAgfSk7XG5cbiAgICB9KTtcblxuXG59KSggalF1ZXJ5ICk7Il19
