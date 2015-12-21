$(".card_number_input").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.card_number_input').focus();
    }
});