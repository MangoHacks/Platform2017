<div class="email-bg" style="background: #F9B64E;padding: 30px 0px 30px 0px;color: white;">
    <div class="pre-head" style="max-width: 600px;margin: 0 auto;padding: 10px 20px 10px 20px;background: #F9B64E;font-size: 10px;color: white;">
        <p>IMPORTAN LOGISTICAL INFORMATION</p>
    </div>
    <div class="header" style="max-width: 480px;margin: 0 auto; text-align: center">
        <img src="{{url('/')}}/img/logo.png" alt="MangoHacks" style="max-width: 50%; margin: 0 auto;">
    </div>
    <div class="email-container" style="max-width: 600px;margin: 0 auto;padding: 0px 20px 20px 20px;background: #F9B64E;">
         <p class="greeting" style="color: white;font-size: 36px;font-weight: bold;">MangoHacks is here!</p>
        <p>Hi hackers! MangoHacks is right around the corner and we're super excited to have you at Florida International Unversity this weekend.</p>

        <p>
            That being said, we have some IMPORTANT LOGISTICAL INFORMATION that will help things go smoothly.
        </p>

        <h3>Registration</h3>
        <p>
            Registration will happen in front of the atrium at <a href="https://goo.gl/maps/xyxi5wX9wq42" style="color: #E53A4B;">PG6 Tech Station.</a><br>
            <strong>Time:</strong> Friday 6:00pm to 8:00pm
        </p>
        <h3>Parking</h3>
        <p>
            PG6 Tech Station is a parking lot on the top levels. If you are parking on campus and you're not an FIU student, contact us at <a href="mailto:team@mangohacks.com" style="color: #E53A4B;">team@mangohacks.com</a> or on the <a href="https://www.facebook.com/groups/596999680448749/" style="color: #E53A4B;">facebook attendees group</a> and we'll set you up with a weekend permit. Otherwise you can park at the visitor parking lots.
        </p>
        <h3>Events</h3>
        <p>
            We have a lot of events planned for you. Ranging from workshops that will take you from basics of coding, to frameworks and technologies to build your idea, to deploying your app. And also events that will help you make an impact in society or explore your dream venture. Keep track of these on our website.
        </p>
        <h4>Workshop Prereqs</h4>
        <p>
            IBM will be holding a workshop on IOT and Bluemix. Make sure you <a href="http://www.ibm.com/cloud-computing/bluemix/" style="color: #E53A4B;">Register for Bluemix.</a>
            <br><br>
            For our iOS Workshop by MakeSchool please make sure you have the latest XCode installed on your Mac.
        </p>

            <p>Also, join our <a href="https://www.facebook.com/groups/596999680448749/" style="color: #E53A4B;">Attendees Facebook Group</a> to start meeting other hackers, organize carpools, share gifs, and get the HYPE going.
        </p>
        <h3>Check out Devpost!</h3>
        <p>
            Want to see what you will be battling for this weekend? We'll be posting updates on prizes as well as the judging criteria on our Devpost.
            <br>
            Also, if you do not have a Devpost account, make sure to make one prior to hacking as you will use Devpost to submit your project.
        </p>
        <a href="https://mangohacks17.devpost.com" class="cto" style="color: white;display: block;margin: 24px auto;width: 240px;background: #E53A4B;border-radius: 5px;text-align: center;text-decoration: none;font-weight: bold;padding: 16px 24px;font-size: 20px;">Check out Devpost!</a>
      
        <h2>Quick Check-in</h2>
        <p>Show this code during check-in so you can get set up quickly.</p>
         
        <img style="margin: 0 auto;" src="{!!$message->embedData(QrCode::format('png')->color(229, 58, 75)->size(360)->generate($attendee['hashed_id']), 'QrCode.png', 'image/png')!!}"> 
      
        <p>
            That's all for now. If you still have any questions, hit us up at <a href="mailto:team@mangohacks.com" style="color: #E53A4B;">team@mangohacks.com</a> or on <a href="https://www.facebook.com/MangoHacks" style="color: #E53A4B;">Facebook</a>, <a href="https://twitter.com/fiumangohacks" style="color: #E53A4B;">Twitter</a> and and <a href="https://instagram.com/fiumangohacks" style="color: #E53A4B;">Instagram</a>. Also, visit mangohacks.com to see our schedule, FAQs, and more.
            <br><br>
            Get HYPED for this weekend and we'll see you all on Friday!</p>
        <p>

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
