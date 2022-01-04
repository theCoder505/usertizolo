<img src="https://www.investopedia.com/thmb/E59aEsxnHa19WWk0PHjQPqWRzeQ=/2121x1414/filters:fill(auto,1)/GettyImages-876199432-f69ab426405a4bd296ec0bc18feba074.jpg"
    alt="" height="500" style="width: 100%">

<center>
    <h1>Email for verifying user account of <i> {{ env('APP_NAME') }} </i> </h1>
</center>
<hr>
<hr>


<p>
    Dear Sir this mail is about verifying your account in {{ env('APP_NAME') }}. <br>
    You are receiving this email because we received an account opening request from you.
    Click the link to simply verify account. <br>
    
    <a href="{{ $theLink }}"> {{ $theLink }}</a>
    <br>
    <br>
    <i> If you did not tried to open the account, no further action is required. </i>

    <br>
</p>

<hr>
<hr>

<h3>
    <b>
        Best Regards,
        <br>
        {{ env('APP_NAME') }}
    </b>
</h3>
