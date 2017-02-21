<div class="email-bg" style="background: #F9B64E;padding: 30px 0px 30px 0px;color: white;">
    <div class="pre-head" style="max-width: 600px;margin: 0 auto;padding: 10px 20px 10px 20px;background: #F9B64E;font-size: 10px;color: white;">
        <a href="{{url('/')}}/confirm/{{ $attendee['hashed_id'] }}" style="color: #E53A4B;">Confirm your spot at MangoHacks!</a>
    </div>
    <div class="header" style="max-width: 480px;margin: 0 auto; text-align: center">
        <img src="{{url('/')}}/img/logo.png" alt="MRE" style="max-width: 50%; margin: 0 auto;">
    </div>
    <div class="email-container" style="max-width: 600px;margin: 0 auto;padding: 0px 20px 20px 20px;background: #F9B64E;">
        <p class="greeting" style="color: white;font-size: 36px;font-weight: bold;">You're coming to MangoHacks {{ $attendee['first_name'] }}!</p>
        <p>This is the first wave of decisions, and you've made the cut.</p>

        <p>
            We're super excited to have you join us in <strong>Miami, FL</strong> this upcoming <strong>Feb 24th - 26th</strong> for a sweet weekend.
        </p>
        <p>
            We will be sending a bus to North Florida, stopping at FSU, UF, and UCF. We'll release details about reserving your a spot on social media and through email in the next in the next day.
        </p>
        <p>
            Unfortunately we can't provide individual travel reimbursements this year. But if you have
            any questions, let us know.
        </p>
        <p>
            For next steps, we'll need to confirm your attendance. So just follow the link bellow and you'll be set.
        </p>
        <a class="cto" href="{{url('/')}}/confirm?h={{ $attendee['hashed_id'] }}" style="color: white;display: block;margin: 24px auto;width: 240px;background: #E53A4B;border-radius: 5px;text-align: center;text-decoration: none;font-weight: bold;padding: 16px 24px;font-size: 20px;">Confirm Attendance</a>
        <p>
            Also, join our <a href="https://www.facebook.com/groups/1714565285540802/" style="color: #E53A4B;">Attendees Facebook Group</a> to start meeting other hackers, organize carpools, share gifs, and get the HYPE going. We'll also be posting info on the bus there.
        </p>

        <p>
            If you still have any questions, hit us up at <a href="mailto:team@mangohacks.com" style="color: #E53A4B;">team@mangohacks.com</a> and follow us on <a href="https://www.facebook.com/MangoHacks" style="color: #E53A4B;">Facebook</a>, <a style="color: #E53A4B;" href="https://www.instagram.com/fiumangohacks/">Instagram</a> and <a href="https://twitter.com/fiumangohacks" style="color: #E53A4B;">Twitter</a>.
        </p>

        <p>&lt;3</p>
        <p>The MangoHacks Team</p>

        <div class="footer" style="background-color: #F9B64E;margin-top: 10px;color: white;padding: 5px;font-size: 11px;">
            <p>
                &copy; 2017 MangoHacks
            </p>
        </div>
    </div>
</div>
