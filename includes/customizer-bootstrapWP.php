<?php

use function PHPSTORM_META\type;

if (!class_exists('Kirki')) {
    return;
};
// KIRKI

//Settings is like a var stored in DB
// adding Kirki config
Kirki::add_config(
    'bootstrapWPPP',
    array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
        )
);


        // panel

        Kirki::add_panel('bootstrapWPP', array(
            'priority'    => 30,
            'title'       => esc_html__('Theme options', 'bootstrapWP'),
            'description' => esc_html__('This is for theme customization', 'bootstrapWP'),
        ));

        // Sections

        Kirki::add_section('Subscribe-bar', array(
            'title'          => esc_html__('Subscribe Bar', 'bootstrapWP'),
            'description'    => esc_html__('My section description.', 'bootstrapWP'),
            'panel'          => 'bootstrapWPP',
            'priority'       => 50,
        ));
        

        // Fields to customize Subscribe bar and subscribe button
        Kirki::add_field(
            'Subscribe-bar',
            array(
          'type'        => 'textarea',
          'settings'    => 'subscribe_text',
          'label'       => esc_html__('Text Block', 'bootstrapWP'),
          'section'     => 'Subscribe-bar',
          'default'     => '<strong>This is default text, if nothing is entered',
          'placeholder' => esc_html__('Add your text here', 'bootstrapWP'),
          'priority'    => 10,
        )
        );
    //   the form
      Kirki::add_field(
          'Subscribe-bar',
          array(
    'type'        => 'code',
    'settings'    => 'subscribe_form',
    'label'       => esc_html__('Opt-in Form HTML', 'bootstrapWP'),
    'description' => esc_html__('Default text', 'bootstrapWP'),
    'section'     => 'Subscribe-bar',
    'priority'    => 10,
  )
      );


// Footer
Kirki::add_section(
    'b2w_footer_section',
    array(
    'priority' => 40,
    'title'    => esc_html__('Footer', 'bootstrapWP'),
        'panel'    => 'bootstrapWPP',
  )
);
Kirki::add_field(
    'bootstrapWPPP',
    array(
    'type'     => 'custom',
    'settings' => 'footer-form-placeholder-hr',
    'section'  => 'b2w_footer_section',
    'default'  => '<h2?>Customizing the footer</h2>',
    'priority' => 10,
  )
);

Kirki::add_field(
    'b2w_customizer_config',
    array(
    'type'            => 'textarea',
    'settings'        => 'footer_copyright',
    'label'           => esc_html__('Footer Copyright Text', 'bootstrapWP'),
      'section'         => 'b2w_footer_section',
    'placeholder'     => esc_html__('Enter copyright text here', 'bootstrapWP'),
        'default'         => 'Default',
    'priority'        => 10,
    'partial_refresh' => array(
      'footer_copyright' => array(
        // getting the footer paragraph text - copyright
        'selector'        => 'footer .copyright p',
        'render_callback' => function () {
            return get_theme_mod('footer_copyright');
        },
      ),
    ),
  )
);

Kirki::add_section(
    'footer_calltoaction_section',
    array(
    'priority'  => 40,
    'title'     => esc_html__('Edit the Footer', 'bootstrapWP'),
    'section'   => 'b2w_footer_section'
  )
);
// Fields in footer
// This is the sub heading 'Join us'
Kirki::add_field(
    'b2w_customizer_config',
    array(
    'type'            => 'text',
    //name
    'settings'        => 'footer_sub_heading',
    'label'           => esc_html__('Sub Heading', 'bootstrapWP'),
    'tooltip'         => esc_html__('Call to Action Section Sub Heading Text', 'bootstrapWP'),
    'section'         => 'footer_calltoaction_section',
    'default'         => esc_html__('Default text that you can edit', 'bootstrapWP'),
    'partial_refresh' => array(
      'footer_sub_heading' => array(
        'selector'          => '.footer-calltoaction p.sub-title',
        'render_callback'   => function () {
            return get_theme_mod('footer_sub_heading');
        }
      ),
    ),
  )
);
//FOOTER  main heading
Kirki::add_field(
    'b2w_customizer_config',
    array(
    'type'            => 'text',
     //name
    'settings'        => 'footer_calltoaction_heading',
    'label'           => esc_html__('Main Heading', 'bootstrapWP'),
    'tooltip'         => esc_html__('Footer Call to Action Heading Text.', 'bootstrapWP'),
    'section'         => 'footer_calltoaction_section',
    'default'         => esc_html__('Bootstrap to WordPress', 'bootstrapWP'),
    'partial_refresh' => array(
      'footer_calltoaction_heading' => array(
        'selector'                  => 'footer .footer-calltoaction h2',
        'render_callback'           => function () {
            return get_theme_mod('footer_calltoaction_heading');
        }
      ),
    ),
  )
);
// Footer textarea edit
Kirki::add_field(
    'b2w_customizer_config',
    array(
    'type'            => 'textarea',
    'settings'        => 'footer_calltoaction_desc',
    'label'           => esc_html__('Description', 'bootstrapWP'),
    'tooltip'         => esc_html__('Enter short description.', 'bootstrapWP'),
    'section'         => 'footer_calltoaction_section',
    'default'         => esc_html__('Default text', 'bootstrapWP'),
    'partial_refresh' => array(
      'footer_calltoaction_desc' => array(
        'selector'              => '.footer-calltoaction p.fcta-desc',
        'render_callback'       => function () {
            return get_theme_mod('footer_calltoaction_desc');
        }
      ),
    ),
  )
);

// button
Kirki::add_field(
  'b2w_customizer_config',
  array(
    'type'            => 'text',
    'settings'        => 'footer_calltoaction_button',
    'label'           => esc_html__( 'This is the text for button', 'bootstrapWP' ),
    'tooltip'         => esc_html__( 'Enter Button Text.', 'bootstrapWP' ),
    'section'         => 'footer_calltoaction_section',
    'default'         => 'Join us ->',
    'partial_refresh' => array(
      'footer_calltoaction_button' => array(
        'selector'        => '.footer-calltoaction .btn',
        'render_callback' => function() {
            return get_theme_mod( 'footer_calltoaction_button' );
          }
      ),
    ),
  )
);

Kirki::add_field(
	'b2w_customizer_config',
  array(
    'type'     => 'link',
    'settings' => 'footer_cta_link',
    'label'    => esc_html__( 'Button Link', 'bootstrapWP' ),
    'tooltip'  => esc_html__( 'Enter a valid URL here', 'bootstrapWP' ),
    'section'  => 'footer_calltoaction_section',
    'default'  => '#',
  )
);

