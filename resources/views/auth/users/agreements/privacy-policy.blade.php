@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div>
    <div class="bg-white px-5 py-3 shadow-sm privacy-header">
      <div class="d-flex align-items-center gap-2 privacy-brgy-logo-container">
        <img class="rounded-circle privacy-brgy-logo" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="logo">
        <h5 class="opacity-75">e-Support</h5>
      </div>
      <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="position-relative">
          <a href="{{ route('resident.register') }}" class="text-dark position-absolute top-50 translate-middle" style="left: -1.5rem;">
            <span class="material-symbols-outlined align-middle">arrow_back_ios</span>
          </a>
          <h3 class="text-center m-0">Privacy Policy</h3>
        </div>
      </div>
      <div class="d-flex justify-content-center privacy-icon">
        <span class="material-symbols-outlined">shield_lock</span>
      </div>
    </div>
    <div class="bg-light">
      <div class="container-sm py-5">
        <p>This privacy notice for Barangay Nancayasan Urdaneta City (“we,” “us,” or “our”), describes how and why we might collect, store, use, and/or share (“process”) your information when you use our services (“Services”), such as when you:</p>
        <ul>
          <li>Visit our website, or any website of ours that links to this privacy notice</li>
          <li>Engage with us in other related ways, including any sales, marketing, or events</li>
        </ul>
        <p>Questions or concerns? Reading this privacy notice will help you understand your privacy rights and choices, if you do not agree with our policies and practices, please do not use our Services, if you still have any questions or concern, please contact us at brgynancayasan@gmail.com.</p>
        <h5>SUMMARY OF KEY POINTS</h5>
        <p><i>This summary provides key points from our privacy notice, but you can find our more details about any of these topics by clicking the link following each key point or by using our table of concern below to find the section you are looking for.</i></p>
        <p>What personal information do we process? When you visit, use, or navigate our Services, we may process personal information depending on how you interact with us and the Services, the choices you make, and the products and features you use. Learn more about personal information you disclose to us.</p>
        <p>Do we process any sensitive personal information? We may process sensitive personal information when necessary with your consent or as otherwise permitted by applicable law. Learn more about sensitive information we process.</p>
        <p>Do we receive any information from third parties? We may receive information from public databases, marketing partners, social media platforms, and other outside sources. Learn more about information collected from other sources.</p>
        <p>How do we process your information? We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law, we may also process your information for other purposes with your consent. We process your information only when we have a valid legal reason to do so. Learn more about how we process your information.</p>
        <p>In what situations and with which parties do we share personal information? We may share information in specific situation and with specific third parties. Learn more about when and with whom we share your personal information.</p>
        <p>How do we keep information safe? We have organizational technical processes and procedures in place to protect your personal information. However, no electronic transmission over the internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers cybercriminals, or other unauthorized third parties will not be able to defeat our security and improperly collect, access, steal, or modify your information. Learn more about how we keep your information safe.</p>
        <p>What are your rights? Depending on where you are located geographically, the applicable privacy law may mean you have certain rights regarding your personal information. Learn more about your privacy rights.</p>
        <p>How do you exercise your rights? The easiest way to exercise your rights is by submitting a data subject access request or by contacting us. We will consider and act upon any request in accordance with applicable data protection laws.</p>
        <p>Want to learn more about what we do with any information we collect? Review the privacy notice in full.</p>
        <h5>TABLE OF CONTENTS</h5>
        <ol class="mb-5">
          <li>WHAT INFORMATION DO WE COLLECT?</li>
          <li>HOW DO WE PROCESS YOUR INFORMATION?</li>
          <li>WHEN AND WWITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?</li>
          <li>HOW LONG DO WE KEEP YOUR INFORMATION?</li>
          <li>HOW DO WE KEEP YOUR INFORMATION SAFE?</li>
          <li>DO WE COLLECT INFORMATION FROM MINORS?</li>
          <li>WHAT ARE YOUR PRIVACY RIGHTS?</li>
          <li>CONTROLS FOR DO-NOT-ATTACK FEATURES</li>
          <li>DO WE MAKE UDATES TO THIS NOTICE?</li>
          <li>HOW CAN YOU CONTACT US ABOUT THIS NOTICE?</li>
          <li>HOW CAN YOU REVIEW UPDATE OR DELETE THE DATA WE COLLECT FROM YOU?</li>
        </ol>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center align-items-center dropdown-btn" data-target="first-info" data-arrow="first-arrow">
          <h5 class="text-white m-0">WHAT INFORMATION DO WE COLLECT?</h5>
          <span id="first-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="first-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p class="fw-bold">Personal information you disclose to us</p>
          <p>In Short: We collect personal information that you provide to us.</p>
          <p>We collect personal information that you voluntarily provide to us when you register on the Services, express an interest in obtaining information about us or our products and Services, when you participate in activities on the Services, or otherwise when you contact us.</p>
          <p>Personal Information Provided by You. The personal information that we collect depends on the context of your interactions with us and the Services, the choices you make, and the products and features you use. The personal information we collect may include the following:</p>
          <ul>
            <li>Names</li>
            <li>Phone Numbers</li>
            <li>Email Addresses</li>
            <li>Mailing Addresses</li>
            <li>Usernames</li>
            <li>Passwords</li>
            <li>Contact Preferences</li>
            <li>Contact or Authentication Data</li>
          </ul>
          <p>Sensitive Information. When necessary, with your consent or as otherwise permitted by applicable law, we process the following categories of sensitive information:</p>
          <ul>
            <li>information revealing religious or philosophical beliefs</li>
            <li>student data social security numbers or other government identifiers</li>
            <li>health data</li>
          </ul>
          <p>All personal information that you provide to us must be true, complete, and accurate, and you must notify us of any changes to such personal information.</p>
          <p>Information automatically collected</p>
          <p>In Short: Some information - such as your Internet Protocol (IP) address and/or browser and device characteristics-is collected automatically when you visit our Services.</p>
          <p>We automatically collect certain information when you visit, use, or navigate the Services. This information does not reveal your specific identity (like your name or contact information) but may include device and usage information, such as your IP address, browser and device characteristics, operating system, language preferences, referring URLs, device name, country, location, information about how and when you use our Services, and other technical information. This information is primarily needed to maintain the security and operation of our Services, and for our internal analytics and reporting purposes.</p>
          <p>The information we collect includes:</p>
          <ul>
            <li>Log and Usage Data. Log and usage data is service-related, diagnostic, usage, and performance information our servers automatically collect when you access or use our Services and which we record in log files. Depending on how you interact with us, this log data may include your IP address, device information, browser type, and settings and information about your activity in the Services (such as the date/time stamps associated with your usage, pages and files viewed, searches, and other actions you take such as which features you use), device event information (such as system activity, error reports (sometimes called "crash dumps"). and hardware settings).</li>
            <li>Device Data. We collect device data such as information about your computer, phone, tablet, or other device you use to access the Services. Depending on the device used, this device data may include information such as your IP address (or proxy server), device and application identification numbers, location, browser type, hardware model, Internet service provider and/or mobile carrier, operating system, and system configuration information.</li>
            <li>Location Data. We collect location data such as information about your device's location, which can be either precise or imprecise. How much information we collect depends on the type and settings of the device you use to access the Services. For example, we may use GPS and other technologies to collect geolocation data that tells us your current location (based on your IP address). You can opt out of allowing us to collect this information either by refusing access to the information or by disabling your Location setting on your device. However, if you choose to opt out, you may not be able to use certain aspects of the Services.</li>
          </ul>
          <p>Information collected from other sources</p>
          <p>In Short: We may collect limited data from public databases, marketing partners, and other outside sources.</p>
          <p>In order to enhance our ability to provide relevant marketing, offers, and services to you and update our records, we may obtain information about you from other sources, such as public databases, joint marketing partners, affiliate programs, data providers, and from other third parties. This information includes mailing addresses, job titles, email addresses, phone numbers, intent data (or user behavior data), Internet Protocol (IP) addresses, social media profiles, social media URLs, and custom profiles, for purposes of targeted advertising and event promotion.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="second-info" data-arrow="second-arrow">
          <h5 class="text-white m-0">HOW DO WE PROCESS YOUR INFORMATION?</h5>
          <span id="second-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="second-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law. We may also process your information for other purposes with your consent.</p>
          <p>We process your personal information for a variety of reasons, depending on how you interact with our Services, including:</p>
          <ul>
            <li>To facilitate account creation and authentication and otherwise manage user accounts. We may process your information so you can create and log in to your account, as well as keep your account in working order.</li>
            <li>To enable user-to-user communications. We may process your information if you choose to use any of our offerings that allow for communication with another user.</li>
            <li>To comply with our legal obligations. We may process your information to comply with our legal obligations, respond to legal requests, and exercise, establish, or defend our legal rights.</li>
          </ul>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="third-info" data-arrow="third-arrow">
          <h5 class="text-white m-0">WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?</h5>
          <span id="third-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="third-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: We may share information in specific situations described in this section and/or with the following third parties.</p>
          <p>We may need to share your personal information in the following situations:</p>
          <ul>
            <li>Business Transfers. We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</li>
          </ul>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="fourth-info" data-arrow="fourth-arrow">
          <h5 class="text-white m-0">HOW LONG DO WE KEEP YOUR INFORMATION?</h5>
          <span id="fourth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="fourth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: We keep your information for as long as necessary to fulfill the purposes outlined in this privacy notice unless otherwise required by law.</p>
          <p>We will only keep your personal information for as long as it is necessary for the purposes set out in this privacy notice, unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements). No purpose in this notice will require us keeping your personal information for longer than the period of time in which users have an account with us.</p>
          <p>When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize such information, or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="fifth-info" data-arrow="fifth-arrow">
          <h5 class="text-white m-0">HOW DO WE KEEP YOUR INFORMATION SAFE?</h5>
          <span id="fifth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="fifth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: We aim to protect your personal information through a system of organizational and technical security measures.</p>
          <p>We have implemented appropriate and reasonable technical and organizational security measures designed to protect the security of any personal information we process. However, despite our safeguards and efforts to secure your information, no electronic transmission over the Internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties will not be able to defeat our security and improperly collect, access, steal, or modify your information. Although we will do our best to protect your personal information, transmission of personal information to and from our Services is at your own risk. You should only access the Services within a secure environment.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="sixth-info" data-arrow="sixth-arrow">
          <h5 class="text-white m-0">DO WE COLLECT INFORMATION FROM MINORS?</h5>
          <span id="sixth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="sixth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In short: We do not knowingly collect data from or market to children under 18 years of age.</p>
          <p>We do not knowingly solicit data from or market to children under 18 years of age. By using the Services, you represent that you are at least 18 or that you are the parent or guardian of such a minor and consent to such minor dependent's use of the Services. If we learn that personal information from users less than 18 years of age has been collected, we will deactivate the account and take reasonable measures to promptly delete such data from our records. If you become aware of any data we may have collected from children under age 18, please contact us at ____________.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="seventh-info" data-arrow="seventh-arrow">
          <h5 class="text-white m-0">WHAT ARE YOUR PRIVACY RIGHTS?</h5>
          <span id="seventh-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="seventh-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: You may review, change, or terminate your account at any time.</p>
          <p>Withdrawing your consent: If we are relying on your consent to process your personal information, which may be express and/or implied consent depending on the applicable law, you have the right to withdraw your consent at any time. You can withdraw your consent at any time by contacting us by using the contact details provided in the section "HOW CAN YOU CONTACT US ABOUT THIS NOTICE?" below.</p>
          <p>However, please note that this will not affect the lawfulness of the processing before its withdrawal nor, when applicable law allows, will it affect the processing of your personal information conducted in reliance on lawful processing grounds other than consent.</p>
          <p class="fw-bold">Account Information</p>
          <p>If you would at any time like to review or change the information in your account or terminate your account, you can:</p>
          <ul>
            <li>Log in to your account settings and update your user account.</li>
            <li>Contact us using the contact information provided.</li>
          </ul>
          <p>Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, we may retain some information in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our legal terms and/or comply with applicable legal requirements.</p>
          <p>If you have questions or comments about your privacy rights, you may email us at bgrynancayasan@gmail.com.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="eighth-info" data-arrow="eighth-arrow">
          <h5 class="text-white m-0">CONTROLS FOR DO-NOT-TRACK FEATURES</h5>
          <span id="eighth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="eighth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>Most web browsers and some mobile operating systems and mobile applications include a Do-Not-Track ("DNT") feature or setting you can activate to signal your privacy preference not to have data about your online browsing activities monitored and collected. At this stage no uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this privacy notice.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="ninth-info" data-arrow="ninth-arrow">
          <h5 class="text-white m-0">DO WE MAKE UPDATES TO THIS NOTICE?</h5>
          <span id="ninth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="ninth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>In Short: Yes, we will update this notice as necessary to stay compliant with relevant laws. We may update this privacy notice from time to time. The updated version will be indicated by an updated "Revised" date and the updated version will be effective as soon as it is accessible. If we make material changes to this privacy notice, we may notify you either by prominently posting a notice of such changes or by directly sending you a notification. We encourage you to review this privacy notice frequently to be informed of how we are protecting your information.</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="tenth-info" data-arrow="tenth-arrow">
          <h5 class="text-white m-0">HOW CAN YOU CONTACT US ABOUT THIS NOTICE?</h5>
          <span id="tenth-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="tenth-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>If you have questions or comments about this notice, you may email us at _____________ or contact us by post at:</p>
          <p class="m-0">Barangay Nancayasan Urdaneta City</p>
          <p class="m-0">Zone 4</p>
          <p class="m-0">Nancayasan</p>
          <p class="m-0">Urdaneta, Pangasinan 2428</p>
          <p>Philippines</p>
        </div>

        <div class="py-2 px-3 d-flex justify-content-between align-items-center dropdown-btn" data-target="eleventh-info" data-arrow="eleventh-arrow">
          <h5 class="text-white m-0">HOW CAN YOU REVIEW, UPDATE, OR DELETE THE DATA WE COLLECT FROM YOU?</h5>
          <span id="eleventh-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
        </div>
        <div id="eleventh-info" class="border-bottom border-start border-end overflow-hidden mb-4 dropdown-info">
          <p>You have the right to request access to the personal information we collect from you, change that information, or delete it. To request to review, update, or delete your personal information, please fill out and submit a data subject access request.</p>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

  <script>

    const dropBtn = document.querySelectorAll('.dropdown-btn');

    dropBtn.forEach(btn => {
      const targetId = btn.getAttribute('data-target');
      const arrowId = btn.getAttribute('data-arrow');

      btn.addEventListener('click', () => {
        const target = document.getElementById(targetId);
        const arrow = document.getElementById(arrowId);

        target.classList.toggle('open');
        arrow.classList.toggle('rotate');
      });
    });

  </script>

@endsection