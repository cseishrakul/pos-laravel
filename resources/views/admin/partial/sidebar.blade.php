<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('pos')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">POS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Employees</span>
          <i class="ml-5 fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.employee')}}" class="nav-link">Add Employee <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.employee')}}" class="nav-link">All Employee <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Customer</span>
          <i class="ml-5 pl-2 fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.customer')}}" class="nav-link">Add Customer <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.customer')}}" class="nav-link">All Customer <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Supplier</span>
          <i class="ml-5 pl-3 fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.supplier')}}" class="nav-link">Add Supplier <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.supplier')}}" class="nav-link">All Supplier <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Salary (EMP)</span>
          <i class="ml-3 pl-3  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic4">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('advance.salary')}}" class="nav-link">Advance Salary <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.advance.salary')}}" class="nav-link">All Advance Salary <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('pay.salary')}}" class="nav-link">Pay Salary <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Category</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic5">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.category')}}" class="nav-link">Add Category <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.category')}}" class="nav-link">All Category <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Product</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic6">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.product')}}" class="nav-link">Add Product <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.product')}}" class="nav-link">All Product <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('import.product')}}" class="nav-link">Import Product <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Expenses</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic7">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('add.expense')}}" class="nav-link">Add Expense <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('today.expense')}}" class="nav-link">Today Expense <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('monthly.expense')}}" class="nav-link">Monthly Expense <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('yearly.expense')}}" class="nav-link">Yearly Expense <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic8" aria-expanded="false" aria-controls="ui-basic8">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Attendence</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic8">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('take.attendence')}}" class="nav-link">Take Attendence <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('all.attendence')}}" class="nav-link">All Attendence <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('monthly.attendence')}}" class="nav-link">Monthly Attendence <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">Yearly Attendence <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic10" aria-expanded="false" aria-controls="ui-basic10">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Orders</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic10">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('pending.order')}}" class="nav-link">Pending Order <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            <li class="nav-item">
              <a href="{{route('success.order')}}" class="nav-link">Success Order <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic9">
          <i class="fa fa-users"></i>
          <span class="menu-title ml-3">Settings</span>
          <i class="ml-2 pl-5  fa fa-plus"></i>
        </a>
        <div class="collapse" id="ui-basic9">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{route('settings')}}" class="nav-link">Setting <i class="ml-3 fa-sharp fa-solid fa-arrow-right"></i></a>
            </li>
          </ul>
        </div>
      </li>
     
    </ul>
  </nav>