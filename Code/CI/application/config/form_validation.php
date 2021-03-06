<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
                 'signup' => array(
                                    array(
                                            'field' => 'user_id',
                                            'label' => '手机',
                                            'rules' => 'numeric|trim|required|min_length[10]|max_length[12]|xss_clean|callback_user_id_check|is_unique[users.user_id]'
                                         ),
                                    array(
                                            'field' => 'passwd',
                                            'label' => '密码',
                                            'rules' => 'trim|required|matches[passconf]'
                                         ),
                                    array(
                                            'field' => 'passconf',
                                            'label' => '密码确认',
                                            'rules' => 'trim|required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => '邮件',
                                            'rules' => 'trim|required|valid_email'
                                         ),
                                    array(
                                            'field' => 'address',
                                            'label' => '地址',
                                            'rules' => 'trim|required'
                                         )
                                    ),
                'sign_in' => array(
                                    array(
                                            'field' => 'user_id',
                                            'label' => '手机',
                                            'rules' => 'numeric|trim|required|min_length[10]|max_length[12]|xss_clean|callback_user_id_check'
                                         ),
                                    array(
                                            'field' => 'passwd',
                                            'label' => '密码',
                                            'rules' => 'trim|required'
                                         )
                                    ),
                 'forget_verify' => array(
                                    array(
                                            'field' => 'user_id',
                                            'label' => '手机',
                                            'rules' => 'numeric|trim|required|min_length[10]|max_length[12]|xss_clean|callback_user_id_check'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => '邮件',
                                            'rules' => 'trim|required|valid_email'
                                         )  
                                    ),
            'new_passwd_verify' => array(
                                   array(
                                            'field' => 'passwd',
                                            'label' => '密码',
                                            'rules' => 'trim|required|matches[passconf]'
                                         ),
                                     array(
                                            'field' => 'passconf',
                                            'label' => '密码确认',
                                            'rules' => 'trim|required'
                                         )
                                    )
                 
               );