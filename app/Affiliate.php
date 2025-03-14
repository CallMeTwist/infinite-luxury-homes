<?php

namespace App;

use App\Models\AffiliateKyc;
use App\Models\AffiliatePlan;
use App\Models\AffiliateWithdrawal;
use App\Models\Client;
use App\Models\AffiliateReferral;
use App\Models\Sale;
use App\Models\State;
use App\Notifications\AffiliateResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Affiliate extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $data = [$this->email];

        $to = $this->email;
        $url = config('app.url');
        $from = 'no-reply@'.$url;
        $fromName = config('app.name');
        $subject = "Reset Password";
        $url = route('affiliate.password.reset', ['token' => $token, 'email' => $this->email]);

        $htmlContent = '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="x-ua-compatible" content="ie=edge" />
                    <title>Password Reset</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <style type="text/css">
                        @media screen {
                            @font-face {
                                font-family: "Source Sans Pro";
                                font-style: normal;
                                font-weight: 400;
                                src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
                            }
                            @font-face {
                                font-family: "Source Sans Pro";
                                font-style: normal;
                                font-weight: 700;
                                src: local("Source Sans Pro Bold"), local("SourceSansPro-Bold"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
                            }
                        }
                        body,
                        table,
                        td,
                        a {
                            -ms-text-size-adjust: 100%; /* 1 */
                            -webkit-text-size-adjust: 100%; /* 2 */
                        }
                        table,
                        td {
                            mso-table-rspace: 0pt;
                            mso-table-lspace: 0pt;
                        }
                        img {
                            -ms-interpolation-mode: bicubic;
                        }
                        a[x-apple-data-detectors] {
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            color: inherit !important;
                            text-decoration: none !important;
                        }
                        div[style*="margin: 16px 0;"] {
                            margin: 0 !important;
                        }
                        body {
                            width: 100% !important;
                            height: 100% !important;
                            padding: 0 !important;
                            margin: 0 !important;
                        }
                        table {
                            border-collapse: collapse !important;
                        }
                        a {
                            color: #1a82e2;
                        }
                        img {
                            height: auto;
                            line-height: 100%;
                            text-decoration: none;
                            border: 0;
                            outline: none;
                        }
                    </style>
                </head>
                <body style="background-color: #e9ecef;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" bgcolor="#e9ecef">
                                <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                        <tr>
                                            <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                    <tr>
                                        <td align="center" valign="top" style="padding: 36px 24px;">
                                            <a href="https://'.$url.'" target="_blank" style="display: inline-block;">
                                                <img src="https://'.$url.'/assets/images/logo.png" alt="Logo" border="0" width="200" style="display: block; width: 200px; max-width: 200px; min-width: 200px;" />
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                    </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#e9ecef">
                                <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                        <tr>
                                            <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset Your Password</h1>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                            </td>
                                        </tr>
                                    </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#e9ecef">
                                <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                        <tr>
                                            <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                            <p style="margin: 0;">Tap the button below to reset your customer account password. If you didn\'t request a new password, you can safely delete this email.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" bgcolor="#ffffff">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                                                    <a href="'.$url.'" target="_blank" style=" display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">
                                                                        Click To Reset Password
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                            <p style="margin: 0;">If that doesn\'t work, copy and paste the following link in your browser:</p>
                                            <p style="margin: 0;"><a href="'.$url.'" target="_blank">'.$url.'</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf;">
                                            <p style="margin: 0;">
                                                Regards,<br />
                                                '.$fromName.'
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                    </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#e9ecef" style="padding: 24px;">
                                <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                        <tr>
                                            <td align="center" valign="top" width="600">
                                <![endif]-->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                    <tr>
                                        <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                            <p style="margin: 0;">You received this email because you are a registered member of <b>'.$fromName.'</b></p>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                        </td>
                                    </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: Fieldphase Group <no-reply@fieldphasegroup.com>' . "\r\n";

        @mail($to, $subject, $htmlContent, $headers);
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }

    /**
     * @return HasOne
     */
    public function kyc()
    {
        return $this->hasOne(AffiliateKyc::class);
    }

    /**
     * @return mixed
     */
    public function clients()
    {
        return $this->hasMany(Client::class)->withTrashed();
    }

    /**
     * @return HasMany
     */
    public function referrals()
    {
        return $this->hasMany(AffiliateReferral::class);
    }

    /**
     * @return Affiliate|Affiliate[]|false|Builder|Builder[]|Collection|Model|\Illuminate\Database\Query\Builder|\Illuminate\Database\Query\Builder[]|mixed|null
     */
    public function referred()
    {
        if($this->referrer_id){
            return Affiliate::withTrashed()->find($this->referrer_id);
        }

        return false;
    }

    /**
     * @return BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * @return HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * @return HasMany
     */
    public function withdrawals()
    {
        return $this->hasMany(AffiliateWithdrawal::class);
    }
}
