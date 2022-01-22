<li class="active">
    <a href="{{ route('home') }}">
        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
@role('admin')
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-users"></i>User Management</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="{{ route('all-users') }}">All Users</a>
        </li>
        <li>
            <a href="{{ route('active-users') }}">Active Users</a>
        </li>
        <li>
            <a href="{{ route('suspended-users') }}">Suspended Users</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-book"></i>Book Management</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="{{ route('category') }}">Book Categories</a>
        </li>
        <li>
            <a href="{{ route('books') }}">All Books</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-calendar-alt"></i>Borrowing Management</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="{{ route('requests') }}">Borrow Request</a>
        </li>
        <li>
            <a href="{{ route('borrowlists') }}">Borrow List</a>
        </li>
        <!-- <li>
            <a href="{{ route('books') }}">Defaulter List</a>
        </li> -->
    </ul>
</li>
<li class="">
    <a href="{{ route('plag') }}" target="_blank">
        <i class="fas fa-search"></i>Plagiarism Search</a>
</li>
<!-- <li class="">
    <a href="https://www.plagscan.com//docman" target="_blank">
        <i class="fas fa-search"></i>Plagiarism Search</a>
</li> -->
@else
<li class="">
    <a href="{{ route('mybook') }}">
        <i class="fas fa-book"></i>My Books</a>
</li>
<li class="">
    <a href="{{ route('showreq') }}">
        <i class="fas fa-download"></i>Borrow Book</a>
</li>
@endrole