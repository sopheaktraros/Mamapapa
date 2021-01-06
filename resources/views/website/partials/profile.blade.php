<div class="account-sidebar bg-white">
    <div class="profile py-2 px-2 mb-1 bg-light">
        <div class="media d-flex align-items-center">
            <div class="media-body text-center">

                <img src="{{ url($profile->image_profile?? '/images/website/profile/avatar1.png') }}" class="mr-3 rounded-circle img-thumbnail shadow-sm profile-img" alt="social">
                <h4 class="m-0 name mt-2 mb-2">{{ active_language() == 'en' ? 'Hi' : 'សួស្ដី' }}, {{ $profile->name }}</h4>
                <div class="balance row mt-2">
                    <p class="col-6 text-muted">
                        {{ active_language() == 'en' ? 'Balance' : 'ចំនួនប្រាក់' }}
                    </p>
                    <p class="col-6 text-primary pl-0 pr-2">
                        $ {{ $profile->balance }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--Profile Menu-->
    <div class="account-menu mb-2">
        <ul class="nav flex-column">
            <li class="nav-item  {{ Request::segment(2) === 'profile' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/profile/'. base64_encode($profile->id)) }}">{{ active_language() == 'en' ? 'Profile' : 'ព័ត៌មានផ្ទាល់ខ្លួន' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'orders' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/orders/history') }}">{{ active_language() == 'en' ? 'Orders History' : 'ប្រវត្តិបញ្ជាទិញ' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'my-delivery' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/my-delivery') }}">{{ active_language() == 'en' ? 'My Delivery' : 'ការដឹកជញ្ជូន' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'shipping-from-china' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/shipping-from-china') }}">{{ active_language() == 'en' ? 'Shipping From China' : 'ដឹកជញ្ជូនពីប្រទេសចិន' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(3) === 'withdraw' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/transaction/withdraw') }}">{{ active_language() == 'en' ? 'Withdraw Balance' : 'ដកប្រាក់គណនី' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(4) === 'all' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('account/transaction/history/all') }}">{{ active_language() == 'en' ? 'Transaction History' : 'ប្រតិបត្តិការទួទាត់សាច់ប្រាក់' }}</a>
            </li>
            <li class="nav-item {{ Request::segment(2) === 'message' ? 'active' : ''}}">
                <a class="nav-link"  href="{{ url('account/message') }}">{{ active_language() == 'en' ? 'Message' : 'សារជូនដំណឹង' }}</a>
            </li>
        </ul>
    </div>
</div>