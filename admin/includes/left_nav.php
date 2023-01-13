<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index"> <span
          class="logo-name">SpaceBooking</span>
          <!-- <img alt="image" src="assets/img/logo.png" class="header-logo" /> -->
      </a>
    </div>
    
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown" id="mainDash">
        <a href="index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>

      <li class="dropdown" id="mainFilter">
        <a href="filter" class="nav-link"><i data-feather="filter"></i><span>Periodic Filter</span></a>
      </li>
      <!-- <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="life-buoy"></i><span>Widgets</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
          <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
        </ul>
      </li> -->
      
      <li class="menu-header">Spaces</li>
      <li class="dropdown" id="spaceRent">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>For rent</span></a>
        <ul class="dropdown-menu">
          <li id="spaceRent1"><a class="nav-link" href="allRentBookings">Bookings</a></li>

          <li id="spaceRent2"><a href="confirmedRentsAdmin">Confirmed Rents Bookings</a></li>
          <li id="spaceRent8"><a href="cancelledRentsAdmin">Cancelled Rents Bookings</a></li>

          <li id="spaceRent4"><a href="listOfRents">View all Rents spaces</a></li>
        </ul>
      </li>

      <li class="dropdown" id="spaceSale">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>For sale</span></a>
        <ul class="dropdown-menu">
          <li id="spaceRent4"><a href="allSalesBookings">Bookings</a></li>
          
          <li id="spaceRent5"><a href="confirmedSalesBooking">Confirmed Sales Bookings</a></li>
          <li id="spaceRent9"><a href="cancelled">Cancelled Sales Bookings</a></li>
          <li id="spaceRent6"><a href="allSalesSpace">View all Sales Spaces</a></li>
          
        </ul>
      </li>

      <!-- <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
            Map</span></a>
      </li> -->
      


      <li class="menu-header">Manage Companies</li>
        <li class="dropdown" id="companiesNav">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Companies</span></a>
          <ul class="dropdown-menu">
            <li id="penCo"><a href="pendingCompanies">Pending Companies</a></li>
            <li id="allCo"><a href="allCompanies">View all companies</a></li>
          </ul>
        </li>
      </li>

      <li class="menu-header">Users</li>
      <li class="dropdown" id="users">
        <a href="users" class="nav-link"><i data-feather="user"></i><span>Users</span></a>
      </li>

      <li class="menu-header">Contacts</li>
        <li class="dropdown" id="messageNav">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="message-circle"></i><span>Messages</span></a>
          <ul class="dropdown-menu">
            <li id="unreadMessage1"><a href="adminUnread">Unread</a></li>
            <li id="allMessage1"><a href="allMessages">All</a></li>
          </ul>
        </li>
        <li class="dropdown" id="navNotification1">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bell"></i><span>Notification</span></a>
          <ul class="dropdown-menu">
            <li id="navNotificationUnread"><a href="unreadNotification">Unread</a></li>
            <li id="navNotificationAll"><a href="adminAllNotification">All</a></li>
          </ul>
        </li>
      </li>
      <!-- <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
            Map</span></a>
      </li> -->
      
    </ul>
  </aside>
</div>