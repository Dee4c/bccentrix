<?php include "adminsession.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

            /* start: Globals */
            *, ::before, ::after {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font: inherit;
            }

            body {
                font-family: 'Inter', sans-serif;
                color: var(--slate-700);
            }
            /* end: Globals */



            /* start: Chat */
            .chat-section {
                box-shadow: inset 0 160px 0 0 var(--emerald-500);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: var(--slate-100);
            }
            .chat-container {
                max-width: 1360px;
                width: 100%;
                height: 720px;
                box-shadow: 0 8px 24px -4px rgba(0, 0, 0, .1);
                background-color: var(--white);
                position: relative;
            }
            /* end: Chat */



            /* start: Sidebar */
            .chat-sidebar {
                width: 64px;
                background-color: var(--slate-100);
                height: 100%;
                display: flex;
                flex-direction: column;
                position: absolute;
                left: 0;
                top: 0;
                z-index: 50;
            }
            .chat-sidebar-logo {
                font-size: 28px;
                color: var(--emerald-600);
                display: block;
                text-align: center;
                padding: 12px 8px;
                text-decoration: none;
            }
            .chat-sidebar-menu {
                list-style-type: none;
                display: flex;
                flex-direction: column;
                height: 100%;
                padding: 16px 0;
            }
            .chat-sidebar-menu > * > a {
                display: block;
                text-align: center;
                padding: 12px 8px;
                font-size: 24px;
                text-decoration: none;
                color: var(--slate-400);
                position: relative;
                transition: color .15s ease-in-out;
            }
            .chat-sidebar-menu > * > a:hover {
                color: var(--slate-600);
            }
            .chat-sidebar-menu > .theactive > a {
                box-shadow: inset 4px 0 0 0 var(--emerald-500);
                color: var(--emerald-600);
                background-color: var(--emerald-100);
            }
            .chat-sidebar-menu > * > a::before {
                content: attr(data-title);
                position: absolute;
                top: 50%;
                left: calc(100% - 16px);
                border-radius: 4px;
                transform: translateY(-50%);
                font-size: 13px;
                padding: 6px 12px;
                background-color: rgba(0, 0, 0, .6);
                color: var(--white);
                opacity: 0;
                visibility: hidden;
                transition: all .15s ease-in-out;
            }
            .chat-sidebar-menu > * > a:hover::before {
                left: calc(100% - 8px);
                opacity: 1;
                visibility: visible;
            }
            .chat-sidebar-profile {
                margin-top: auto;
                position: relative;
            }
            .chat-sidebar-profile-toggle {
                background-color: transparent;
                border: none;
                outline: transparent;
                width: 40px;
                height: 40px;
                margin: 0 auto;
                display: block;
                cursor: pointer;
            }
            .chat-sidebar-profile-toggle > img {
                object-fit: cover;
                width: 100%;
                height: 100%;
                border-radius: 50%;
            }
            .chat-sidebar-profile-dropdown {
                position: absolute;
                bottom: 100%;
                left: 16px;
                background-color: var(--white);
                box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
                list-style-type: none;
                border-radius: 4px;
                padding: 4px 0;
                opacity: 0;
                visibility: hidden;
                transform: scale(.9);
                transform-origin: left bottom;
                transition: all .15s ease-in-out;
            }
            .chat-sidebar-profile.theactive .chat-sidebar-profile-dropdown {
                opacity: 1;
                visibility: visible;
                transform: scale(1);
            }
            .chat-sidebar-profile-dropdown a {
                display: flex;
                align-items: center;
                padding: 8px 12px;
                text-decoration: none;
                color: var(--slate-400);
                font-size: 14px;
            }
            .chat-sidebar-profile-dropdown a:hover {
                background-color: var(--slate-100);
                color: var(--slate-600);
            }
            .chat-sidebar-profile-dropdown a:theactive {
                background-color: var(--slate-200);
            }
            .chat-sidebar-profile-dropdown a i {
                margin-right: 12px;
                font-size: 17px;
            }
            /* end: Sidebar */



            /* start: Content side */
            .chat-content {
                padding-left: 64px;
                height: 100%;
                position: relative;
            }
            .content-sidebar {
                width: 260px;
                background-color: var(--white);
                display: flex;
                flex-direction: column;
                height: 100%;
                position: absolute;
                top: 0;
                left: 64px;
            }
            .content-sidebar-title {
                font-size: 20px;
                font-weight: 600;
                padding: 16px;
            }
            .content-sidebar-form {
                position: relative;
                padding: 0 16px;
            }
            .content-sidebar-input {
                padding: 8px 16px;
                background-color: var(--slate-100);
                border: 1px solid var(--slate-300);
                outline: none;
                width: 100%;
                border-radius: 4px;
                padding-right: 32px;
                font-size: 14px;
            }
            .content-sidebar-input:focus {
                border-color: var(--slate-400);
            }
            .content-sidebar-submit {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 32px;
                color: var(--slate-400);
                background-color: transparent;
                outline: transparent;
                border: none;
                cursor: pointer;
                transition: color .15s ease-in-out;
            }
            .content-sidebar-submit:hover {
                color: var(--slate-600);
            }
            .content-messages {
                overflow-y: auto;
                height: 100%;
                margin:0;
            }
            .content-messages-list {
                list-style-type: none;
                padding: 8px 0;

            }
            .content-messages-list > * > a {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: var(--slate-700);
                padding: 6px 16px;
            }
            .content-messages-list > * > a:hover {
                background-color: var(--slate-50);
            }
            .content-messages-list > .theactive > a {
                background-color: var(--slate-100);
            }
            .content-message-title {
                margin-left: 16px;
                margin-right: 16px;
                color: var(--slate-400);
                font-size: 13px;
                font-weight: 500;
                margin-bottom: 2px;
                position: relative;
            }
            .content-message-title > * {
                position: relative;
                z-index: 1;
                padding: 0 4px 0 0;
                background-color: var(--white);
            }
            .content-message-title::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: 0;
                width: 100%;
                height: 0;
                border-bottom: 1px solid var(--slate-300);
                z-index: 0;
            }
            .content-message-image {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                object-fit: cover;
                flex-shrink: 0;
                margin-right: 12px;
            }
            .content-message-info {
                display: grid;
                margin-right: 12px;
                width: 100%;
            }
            .content-message-name {
                display: block;
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 2px;
            }
            .content-message-text {
                font-size: 13px;
                color: var(--slate-400);
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
            }
            .content-message-more {
                text-align: right;
            }
            .content-message-unread {
                font-size: 12px;
                font-weight: 500;
                color: var(--white);
                background-color: var(--emerald-500);
                padding: 2px 4px;
                border-radius: 4px;
            }
            .content-message-time {
                font-size: 12px;
                color: var(--slate-400);
                font-weight: 500;
            }
            /* end: Content side */



            /* start: Conversation */
            .conversation {
                background-color: var(--slate-100);
                height: 100%;
                padding-left: 256px;
                display: none;
            }
            .conversation.theactive {
                display: flex;
                flex-direction: column;
            }
            .conversation-top {
                padding: 8px 16px;
                background-color: var(--white);
                display: flex;
                align-items: center;
            }
            .conversation-back {
                background-color: transparent;
                border: none;
                outline: none;
                width: 32px;
                height: 32px;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                cursor: pointer;
                color: var(--slate-400);
                margin-right: 12px;
                display: none;
            }
            .conversation-back:hover {
                background-color: var(--slate-100);
                border-radius: 50%;
                color: var(--slate-600);
            }
            .conversation-back:theactive {
                background-color: var(--slate-200);
            }
            .conversation-user {
                display: flex;
                align-items: center;
            }
            .conversation-user-image {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                object-fit: cover;
                margin-right: 8px;
            }
            .conversation-user-name {
                font-weight: 500;
                font-size: 17px;
            }
            .conversation-user-status {
                color: var(--slate-400);
                font-size: 13px;
            }
            .conversation-user-status::before {
                content: '';
                width: 10px;
                height: 10px;
                background-color: var(--slate-300);
                border-radius: 50%;
                vertical-align: middle;
                display: inline-block;
                margin-right: 4px;
            }
            .conversation-user-status.online::before {
                background-color: var(--emerald-500);
            }
            .conversation-buttons {
                display: flex;
                align-items: center;
                margin-left: auto;
            }
            .conversation-buttons > * {
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 4px;
                font-size: 20px;
                background-color: transparent;
                border: none;
                outline: transparent;
                cursor: pointer;
                color: var(--slate-600);
                margin-left: 4px;
            }
            .conversation-buttons > :hover {
                background-color: var(--slate-100);
                color: var(--slate-700);
            }
            .conversation-buttons > :theactive {
                background-color: var(--slate-200);
            }

            .conversation-main {
                overflow-y: auto;
                overflow-x: hidden;
                height: 100%;
                padding: 16px;
            }
            .conversation-wrapper {
                list-style-type: none;
            }
            .conversation-item {
                display: flex;
                align-items: flex-end;
                flex-direction: row-reverse;
                margin-bottom: 16px;
            }
            .conversation-item.me {
                flex-direction: row;
            }
            .conversation-item-side {
                margin-left: 8px;
            }
            .conversation-item.me .conversation-item-side {
                margin-right: 8px;
            }
            .conversation-item-image {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                object-fit: cover;
                display: block;
            }
            .conversation-item-content {
                width: 100%;
            }
            .conversation-item-wrapper:not(:last-child) {
                margin-bottom: 8px;
            }
            .conversation-item-box {
                max-width: 720px;
                position: relative;
                margin-left: auto;
            }
            .conversation-item.me .conversation-item-box {
                margin-left: unset;
            }
            .conversation-item-text {
                padding: 12px 16px 8px;
                background-color: var(--white);
                box-shadow: 0 2px 12px -2px rgba(0, 0, 0, .1);
                font-size: 14px;
                border-radius: 6px;
                line-height: 1.5;
                margin-left: 32px;
            }
            .conversation-item.me .conversation-item-text {
                margin-left: unset;
                margin-right: 32px;
            }
            .conversation-item.me .conversation-item-text {
                background-color: var(--emerald-500);
                box-shadow: 0 2px 12px -2px var(--emerald-500);
                color: rgba(255, 255, 255, .8);
            }
            .conversation-item-time {
                font-size: 10px;
                color: var(--slate-400);
                display: block;
                text-align: right;
                margin-top: 4px;
                line-height: 1;
            }
            .conversation-item.me .conversation-item-time {
                color: rgba(255, 255, 255, .7);
            }
            .conversation-item-dropdown {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                visibility: hidden;
                transition: all .15s ease-in-out;
            }
            .conversation-item.me .conversation-item-dropdown {
                left: unset;
                right: 0;
            }
            .conversation-item-wrapper:hover .conversation-item-dropdown {
                opacity: 1;
                visibility: visible;
            }
            .conversation-item-dropdown-toggle {
                width: 24px;
                height: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 4px;
                background-color: var(--white);
                outline: transparent;
                border: 1px solid var(--slate-200);
                cursor: pointer;
                transition: all .15s ease-in-out;
            }
            .conversation-item-dropdown-toggle:hover {
                background-color: var(--emerald-500);
                color: var(--white);
                box-shadow: 0 2px 12px -2px var(--emerald-500);
            }
            .conversation-item-dropdown-toggle:theactive {
                background-color: var(--emerald-600);
            }
            .conversation-item-dropdown-list {
                position: absolute;
                top: 100%;
                left: 0;
                background-color: var(--white);
                z-index: 10;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
                border-radius: 4px;
                padding: 4px 0;
                list-style-type: none;
                opacity: 0;
                visibility: hidden;
                transform: scale(.9);
                transform-origin: left top;
                transition: all .15s ease-in-out;
            }
            .conversation-item.me .conversation-item-dropdown-list {
                left: unset;
                right: 0;
            }
            .conversation-item-dropdown.theactive .conversation-item-dropdown-list {
                opacity: 1;
                visibility: visible;
                transform: scale(1);
            }
            .conversation-item-dropdown-list a {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: var(--slate-400);
                font-size: 13px;
                padding: 6px 12px;
            }
            .conversation-item-dropdown-list a:hover {
                background-color: var(--slate-100);
                color: var(--slate-600);
            }
            .conversation-item-dropdown-list a:theactive {
                background-color: var(--slate-200);
            }
            .conversation-item-dropdown-list a i {
                font-size: 16px;
                margin-right: 8px;
            }
            .coversation-divider {
                text-align: center;
                font-size: 13px;
                color: var(--slate-400);
                margin-bottom: 16px;
                position: relative;
            }
            .coversation-divider::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: 0;
                width: 100%;
                height: 0;
                border-bottom: 1px solid var(--slate-300);
            }
            .coversation-divider span {
                display: inline-block;
                padding: 0 8px;
                background-color: var(--slate-100);
                position: relative;
                z-index: 1;
            }

            .conversation-form {
                padding: 8px 16px;
                background-color: var(--white);
                display: flex;
                align-items: flex-end;
            }
            .conversation-form-group {
                width: 100%;
                position: relative;
                margin-left: 16px;
                margin-right: 16px;
            }
            .conversation-form-input {
                background-color: var(--slate-100);
                border: 1px solid var(--slate-300);
                border-radius: 4px;
                outline: transparent;
                padding: 10px 32px 10px 16px;
                font: inherit;
                font-size: 14px;
                resize: none;
                width: 100%;
                display: block;
                line-height: 1.5;
                max-height: calc(20px + ((14px * 2) * 6));
            }
            .conversation-form-input:focus {
                border-color: var(--slate-400);
            }
            .conversation-form-record {
                position: absolute;
                bottom: 8px;
                right: 16px;
                font-size: 20px;
                color: var(--slate-400);
                background-color: transparent;
                border: none;
                outline: transparent;
                cursor: pointer;
            }
            .conversation-form-record:hover {
                color: var(--slate-600);
            }
            .conversation-form-button {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 4px;
                border: none;
                background-color: transparent;
                outline: transparent;
                font-size: 20px;
                color: var(--slate-400);
                cursor: pointer;
                flex-shrink: 0;
            }
            .conversation-form-button:hover {
                background-color: var(--slate-100);
                color: var(--slate-600);
            }
            .conversation-form-button:theactive {
                background-color: var(--slate-200);
                color: var(--slate-600);
            }
            .conversation-form-submit {
                background-color: var(--emerald-500);
                box-shadow: 0 2px 8px -2px var(--emerald-500);
                color: var(--white);
            }
            .conversation-form-submit:hover {
                background-color: var(--emerald-600);
                color: var(--white);
            }
            .conversation-form-submit:theactive {
                background-color: var(--emerald-700);
                color: var(--white);
            }
            .conversation-default {
                align-items: center;
                justify-content: center;
                padding: 16px;
                padding-left: calc(256px + 16px);
                color: var(--slate-400);
            }
            .conversation-default i {
                font-size: 32px;
            }
            .conversation-default p {
                margin-top: 16px;
            }
            /* end: Conversation */



            /* start: Breakpoints */
            @media screen and (max-width: 1600px) {
                .chat-container {
                    max-width: unset;
                    height: 100vh;
                }
            }

            @media screen and (max-width: 767px) {
                .chat-sidebar {
                    top: unset;
                    bottom: 0;
                    width: 100%;
                    height: 48px;
                }
                .chat-sidebar-logo {
                    display: none;
                }
                .chat-sidebar-menu {
                    flex-direction: row;
                    padding: 0;
                }
                .chat-sidebar-menu > *,
                .chat-sidebar-menu > * > a {
                    width: 100%;
                    height: 100%;
                }
                .chat-sidebar-menu > * > a {
                    padding: 8px;
                }
                .chat-sidebar-menu > .theactive > a {
                    box-shadow: inset 0 4px 0 0 var(--emerald-500);
                }
                .chat-sidebar-profile {
                    margin-top: 0;
                    display: flex;
                    align-items: center;
                }
                .chat-sidebar-profile-toggle {
                    width: 32px;
                    height: 32px;
                }
                .chat-sidebar-profile-dropdown {
                    left: unset;
                    right: 16px;
                }

                .conversation,
                .chat-content {
                    padding-left: unset;
                }
                .content-sidebar {
                    left: unset;
                    z-index: 10;
                    width: 100%;
                }
                .chat-sidebar-menu > * > a::before {
                    left: 50%;
                    transform: translateX(-50%);
                    bottom: 100%;
                    top: unset;
                }
                .chat-sidebar-menu > * > a:hover::before {
                    bottom: calc(100% + 8px);
                    left: 50%;
                }

                .chat-content {
                    position: relative;
                    height: calc(100% - 48px);
                }
                .conversation.theactive {
                    position: relative;
                    z-index: 20;
                }
                .conversation-back {
                    display: flex;
                }
                .conversation-default.theactive {
                    display: none;
                    padding: 16px;
                }
            }
            /* end: Breakpoints */
</style>
    <title>Chat</title>
</head>
<body>
    <!-- start: Chat -->
    <section class="chat-section">
        <div class="chat-container">
            <!-- start: Sidebar -->
            <aside class="chat-sidebar">
                <a href="#" class="chat-sidebar-logo">
                    <i class="ri-chat-1-fill"></i>
                </a>
                <ul class="chat-sidebar-menu">
                    <!-- <li class="theactive"><a href="#" data-title="Chats"><i class="ri-chat-3-line"></i></a></li> -->
                    <li><a href="adminannouncement.php" data-title="Home"><i class="ri-home-line"></i></a></li>
                    <!-- <li><a href="#" data-title="Documents"><i class="ri-folder-line"></i></a></li>
                    <li><a href="#" data-title="Settings"><i class="ri-settings-line"></i></a></li> -->
                    <li class="chat-sidebar-profile">
                        <button type="button" class="chat-sidebar-profile-toggle">
                            <img src="<?php echo $_SESSION['profile_picture'] ?>" alt="">
                        </button>

                    </li>
                </ul>
            </aside>
            <!-- end: Sidebar -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
          /* *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
          } */
          body{
            /* display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #f7f7f7;
            padding: 0 10px; */
            overflow-y: hidden;
          }
          .wrapper{
            max-width: 450px;
            width: 100%;
            border-radius: 16px;
          }
        
          .chatwrapper{
            bottom:650px;
            display: flex;
            position: relative;
            z-index: 1;
            left: 330px;
            height: 100;
            width: 1010px;
            background: lightgrey;
          }

          /* Login & Signup Form CSS Start */
          .form{
            padding: 25px 30px;
          }
          .form header{
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
          }
          .form form{
            margin: 20px 0;
          }
          .form form .error-text{
            color: #721c24;
            padding: 8px 10px;
            text-align: center;
            border-radius: 5px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            margin-bottom: 10px;
            display: none;
          }
          .form form .name-details{
            display: flex;
          }
          .form .name-details .field:first-child{
            margin-right: 10px;
          }
          .form .name-details .field:last-child{
            margin-left: 10px;
          }
          .form form .field{
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
            position: relative;
          }
          .form form .field label{
            margin-bottom: 2px;
          }
          .form form .input input{
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
          }
          .form form .field input{
            outline: none;
          }
          .form form .image input{
            font-size: 17px;
          }
          .form form .button input{
            height: 45px;
            border: none;
            color: #fff;
            font-size: 17px;
            background: #333;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 13px;
          }
          .form form .field i{
            position: absolute;
            right: 15px;
            top: 70%;
            color: #ccc;
            cursor: pointer;
            transform: translateY(-50%);
          }
          .form form .field i.active::before{
            color: #333;
            content: "\f070";
          }
          .form .link{
            text-align: center;
            margin: 10px 0;
            font-size: 17px;
          }
          .form .link a{
            color: #333;
          }
          .form .link a:hover{
            text-decoration: underline;
          }


          /* Users List CSS Start */
          .users{
            padding: 25px 30px;
          }
          .users header,
          .users-list a{
            display: flex;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e6e6e6;
            justify-content: space-between;
            text-decoration: none;
            font-size: 10px;
          }
          .wrapper img{
            object-fit: cover;
            border-radius: 50%;
          }
          .users header img{
            height: 50px;
            width: 50px;
          }
          :is(.users, .users-list) .content{
            display: flex;
            align-items: center;
          }
          :is(.users, .users-list) .content .details{
            color: #000;
            margin-left: 20px;
          }
          :is(.users, .users-list) .details span{
            font-size: 12px;
            font-weight: 500;
          }
          /* .users header .logout{
            display: block;
            background: #333;
            color: #fff;
            outline: none;
            border: none;
            padding: 7px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
          } */
          .users .search{
            margin:0;
            bottom:20px;
            margin-bottom: 0;
            display: flex;
            position: relative;
            align-items: center;
            justify-content: space-between;
          }
          .users .search .text{
            font-size: 11px;
          }
          .users .search input{
            position: absolute;
            height: 42px;
            width: calc(100% - 50px);
            font-size: 11px;
            padding: 0 13px;
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.2s ease;
          }
          .users .search input.show{
            opacity: 1;
            pointer-events: auto;
          }
          .users .search button{
            position: relative;
            z-index: 1;
            width: 47px;
            height: 42px;
            font-size: 19px;
            cursor: pointer;
            border: none;
            background: #fff;
            color: #333;
            outline: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.2s ease;
          }
          .users .search button.active{
            background: #333;
            color: #fff;
          }
          .search button.active i::before{
            content: '\f00d';
          }
          .users-list{
            max-height: 500px;
            overflow-y: auto;
          }
          :is(.users-list, .chat-box)::-webkit-scrollbar{
            width: 0px;
          }
          .users-list a{
            padding-bottom: 10px;
            margin-bottom: 15px;
            padding-right: 15px;
            border-bottom-color: #f1f1f1;
          }
          .users-list a:last-child{
            margin-bottom: 0px;
            border-bottom: none;
          }
          .users-list a img{
            height: 30px;
            width: 30px;
          }
          .users-list a .details p{
            color: #67676a;
          }
          .users-list a .status-dot{
            font-size: 11px;
            color: #41db51;
            padding-left: 10px;
          }
          .users-list a .status-dot.offline{
            color: #ccc;
          }

          /* Chat Area CSS Start */
          .chat-area header{
            display: flex;
            align-items: center;
            padding: 18px 30px;
          }
          .chat-area header .back-icon{
            color: #333;
            font-size: 11px;
          }
          .chat-area header img{
            height: 45px;
            width: 45px;
            margin: 0 15px;
            border-radius: 50%;
          }
          .chat-area header .details span{
            font-size: 17px;
            font-weight: 500;
          }
          .chat-box{
            position: relative;
            min-height: 465px;
            max-height: 600px;
            overflow-y: auto;
            width: 990px;
            margin-left:10px;
            border-radius: 7px;
            padding: 10px 30px 20px 30px;
            background: #f7f7f7;
            /* box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                        inset 0 -32px 32px -32px rgb(0 0 0 / 5%); */
                        
          }
          .chat-box .text{
            position: absolute;
            top: 45%;
            left: 50%;
            width: calc(100% - 50px);
            text-align: center;
            transform: translate(-50%, -50%);
          }
          .chat-box .chat{
            margin: 15px 0;
          }
          .chat-box .chat p{
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                        0rem 16px 16px -16px rgb(0 0 0 / 10%);
          }
          .chat-box .outgoing{
            display: flex;
          }
          .chat-box .outgoing .details{
            margin-left: auto;
            max-width: calc(100% - 130px);
          }
          .outgoing .details p{
            background: #333;
            color: #fff;
            border-radius: 18px 18px 0 18px;
          }
          .chat-box .incoming{
            display: flex;
            align-items: flex-end;
          }
          .chat-box .incoming img{
            height: 35px;
            width: 35px;
            border-radius: 50%;
          }
          .chat-box .incoming .details{
            margin-right: auto;
            margin-left: 10px;
            max-width: calc(100% - 130px);
          }
          .incoming .details p{
            background: #fff;
            color: #333;
            border-radius: 18px 18px 18px 0;
          }
          .typing-area{
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
          }
          .typing-area input{
            height: 45px;
            width: calc(100% - 58px);
            font-size: 16px;
            padding: 0 13px;
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
          }
          .typing-area button{
            color: #fff;
            width: 55px;
            border: none;
            outline: none;
            background: #333;
            font-size: 19px;
            cursor: pointer;
            opacity: 0.7;
            pointer-events: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s ease;
          }
          .typing-area button.active{
            opacity: 1;
            pointer-events: auto;
          }

          /* Responive media query */
          @media screen and (max-width: 450px) {
            .form, .users{
              padding: 20px;
            }
            .form header{
              text-align: center;
            }
            .form form .name-details{
              flex-direction: column;
            }
            .form .name-details .field:first-child{
              margin-right: 0px;
            }
            .form .name-details .field:last-child{
              margin-left: 0px;
            }

            .users header img{
              height: 45px;
              width: 45px;
            }
            .users header .logout{
              padding: 6px 10px;
              font-size: 16px;
            }
            :is(.users, .users-list) .content .details{
              margin-left: 15px;
            }

            .users-list a{
              padding-right: 10px;
            }

            .chat-area header{
              padding: 15px 20px;
            }
            .chat-box{
              min-height: 400px;
              padding: 10px 15px 15px 20px;
            }
            .chat-box .chat p{
              font-size: 15px;
            }
            .chat-box .outogoing .details{
              max-width: 230px;
            }
            .chat-box .incoming .details{
              max-width: 265px;
            }
            .incoming .details img{
              height: 30px;
              width: 30px;
            }
            .chat-area form{
              padding: 20px;
            }
            .chat-area form input{
              height: 40px;
              width: calc(100% - 48px);
            }
            .chat-area form button{
              width: 45px;
            }
          }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
            <!-- start: Content -->
            <div class="chat-content">
                <!-- start: Content side -->
                <div class="content-sidebar">
                    <div class="content-sidebar-title">Chats 
                    <a style="text-decoration: none; font-size:25px; color: black; float:right; margin-right:10px;"  href="adminannouncement.php" data-title="Home"><i class="ri-home-line"></i></a></div>
                    <div class="wrapper">
                    <section class="users">
                    <div class="search">
                        <span class="text">Select an user to start chat</span>
                        <input type="text" placeholder="Enter name to search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="users-list">
                    </div>
                    </section>
                    </div>

                </div>
                <!-- end: Content side -->
                <!-- start: Conversation -->
                <div class="conversation conversation-default theactive">
                    <i class="ri-chat-3-line"></i>
                    <p>Select chat and view conversation!</p>
                </div>
                <div class="conversation" id="conversation-1">
                 </div>
                <!-- end: Conversation -->
            </div>
            <!-- end: Content -->
        </div>
    </section>
    <!-- end: Chat -->
    
    <script>
                // start: Sidebar
            document.querySelector('.chat-sidebar-profile-toggle').addEventListener('click', function(e) {
                e.preventDefault()
                this.parentElement.classList.toggle('theactive')
            })

            document.addEventListener('click', function(e) {
                if(!e.target.matches('.chat-sidebar-profile, .chat-sidebar-profile *')) {
                    document.querySelector('.chat-sidebar-profile').classList.remove('theactive')
                }
            })
            // end: Sidebar



            // start: Coversation
            document.querySelectorAll('.conversation-item-dropdown-toggle').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.preventDefault()
                    if(this.parentElement.classList.contains('theactive')) {
                        this.parentElement.classList.remove('theactive')
                    } else {
                        document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
                            i.classList.remove('theactive')
                        })
                        this.parentElement.classList.add('theactive')
                    }
                })
            })

            document.addEventListener('click', function(e) {
                if(!e.target.matches('.conversation-item-dropdown, .conversation-item-dropdown *')) {
                    document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
                        i.classList.remove('theactive')
                    })
                }
            })

            document.querySelectorAll('.conversation-form-input').forEach(function(item) {
                item.addEventListener('input', function() {
                    this.rows = this.value.split('\n').length
                })
            })

            document.querySelectorAll('[data-conversation]').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.preventDefault()
                    document.querySelectorAll('.conversation').forEach(function(i) {
                        i.classList.remove('theactive')
                    })
                    document.querySelector(this.dataset.conversation).classList.add('theactive')
                })
            })

            document.querySelectorAll('.conversation-back').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.preventDefault()
                    this.closest('.conversation').classList.remove('theactive')
                    document.querySelector('.conversation-default').classList.add('theactive')
                })
            })
            // end: Coversation 
    </script>

<script>
            const searchBar = document.querySelector(".search input"),
        searchIcon = document.querySelector(".search button"),
        usersList = document.querySelector(".users-list");

        searchIcon.onclick = ()=>{
        searchBar.classList.toggle("show");
        searchIcon.classList.toggle("active");
        searchBar.focus();
        if(searchBar.classList.contains("active")){
            searchBar.value = "";
            searchBar.classList.remove("active");
        }
        }

        searchBar.onkeyup = ()=>{
        let searchTerm = searchBar.value;
        if(searchTerm != ""){
            searchBar.classList.add("active");
        }else{
            searchBar.classList.remove("active");
        }
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "admin_chatsearch.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        }

        setInterval(() =>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "admin_chatusers.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                }
                }
            }
        }
        xhr.send();
        }, 500);
</script>


</body>
</html>