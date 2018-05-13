<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            @each('admin.widgets.aside-element', $config['menu'], 'element')
        </ul>
    </section>
</aside>