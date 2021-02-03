$(function () {

    baguetteBox.run('.gallery');

        $('#btn-rand').click(function () {
            let rand = Math.floor(Math.random() * 25) + 1;
            open(`http://bogdanovmaster.site/profile/${rand}`)
        });
        $('#btn-reg').click(function () {
            open('http://bogdanovmaster.site/register')
        });
        $('#btn-hh').click(function () {
            open('https://hh.ru/applicant/resumes/view?resume=a0aa1c29ff07e2cd9b0039ed1f535375427a47')
        });

    $('#staticBackdrop').modal('show');

});

