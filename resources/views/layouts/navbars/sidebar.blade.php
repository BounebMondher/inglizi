<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('INGLIZI') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'grades' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('grades') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Grades') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'units' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('units') }}">
          <i class="material-icons">table_rows</i>
          <p>{{ __('Units') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'lessons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('lessons') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Lessons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'sections' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('sections') }}">
          <i class="material-icons">view_list</i>
          <p>{{ __('Sections') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>