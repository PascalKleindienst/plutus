$(document).ready(($) => {
    let body = $('body');

    const resizeBroadcast = () => {
        let timesRun = 0;
        const interval = setInterval(function(){
            timesRun += 1;
            if (timesRun === 5) {
                clearInterval(interval);
            }
            window.dispatchEvent(new Event('resize'));
        }, 62.5);
    }

    // Dropdown Menu
    $.navigation.on('click', 'a', (e) => {
        if ($.ajaxLoad) {
            e.preventDefault();
        }

        if ($(this).hasClass('nav-dropdown-toggle')) {
            $(this).parent().toggleClass('open');
            resizeBroadcast();
        }
    });    

    /* ---------- Main Menu Open/Close, Min/Full ---------- */
    $('.navbar-toggler').click(function(){
        if ($(this).hasClass('sidebar-toggler')) {
            body.toggleClass('sidebar-hidden');
            resizeBroadcast();
        }

        if ($(this).hasClass('sidebar-minimizer')) {
            body.toggleClass('sidebar-minimized');
            resizeBroadcast();
        }

        if ($(this).hasClass('aside-menu-toggler')) {
            body.toggleClass('aside-menu-hidden');
            resizeBroadcast();
        }

        if ($(this).hasClass('mobile-sidebar-toggler')) {
            body.toggleClass('sidebar-mobile-show');
            resizeBroadcast();
        }
    });

    $('.sidebar-close').click(() => {
        body.toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
    });

    /* ---------- Disable moving to top ---------- */
    $('a[href="#"][data-top!=true]').click((e) => {
        e.preventDefault();
    });
});
