<div class="email-bg" style="background: #F9B64E;padding: 30px 0px 30px 0px;color: white;">
    <div class="pre-head" style="max-width: 600px;margin: 0 auto;padding: 10px 20px 10px 20px;background: #F9B64E;font-size: 10px;color: white;">
        <span>MangoHacks Logistics</span>
    </div>
    <div class="header" style="max-width: 480px;margin: 0 auto; text-align: center">
        <img src="{{url('/')}}/img/logo.png" alt="MRE" style="max-width: 50%; margin: 0 auto;">
    </div>
    <div class="email-container" style="max-width: 600px;margin: 0 auto;padding: 0px 20px 20px 20px;background: #F9B64E;">
        <p class="greeting" style="color: white;font-size: 36px;font-weight: bold;">MangoHacks is coming up soon!</p>
        <p>MangoHacks is around the corner and we've got some info for you.</p>
        
        <img style="margin: 0 auto;" src="{!!$message->embedData(QrCode::format('png')->color(229, 58, 75)->size(360)->generate($attendee['hashed_id']), 'QrCode.png', 'image/png')!!}">

        <p>
            Also, join our <a href="https://www.facebook.com/groups/1714565285540802/" style="color: #E53A4B;">Attendees Facebook Group</a> to start meeting other hackers, organize carpools, share gifs, and get the HYPE going. We'll also be posting info on the bus there.
        </p>

        <p>
            If you still have any questions, hit us up at <a href="mailto:team@mangohacks.com" style="color: #E53A4B;">team@mangohacks.com</a> or on <a href="https://www.facebook.com/MangoHacks" style="color: #E53A4B;">Facebook</a> and <a href="https://twitter.com/fiumangohacks" style="color: #E53A4B;">Twitter</a>.
        </p>

        <p>&lt;3</p>
        <p>The MangoHacks Team</p>

        <div class="footer" style="background-color: #F9B64E;margin-top: 10px;color: white;padding: 5px;font-size: 11px;">
            <p>
                &copy; 2016 MangoHacks
            </p>
        </div>
    </div>
</div>
