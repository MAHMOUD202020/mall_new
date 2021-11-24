<?php

namespace Database\Seeders;

use App\Models\FAQ;
use App\Models\Store;
use Illuminate\Database\Seeder;
use function Symfony\Component\String\s;

class FAQSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textEn = 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.';

        $textAr = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed ligula sit amet leo vulputate placerat. Quisque eget mauris metus. Sed finibus nec purus non consequat. Aenean eu tellus ut elit pharetra vulputate. Pellentesque sit amet scelerisque nibh. Mauris sit amet tristique sapien. Quisque luctus justo eget lectus vestibulum, sit amet vulputate ex hendrerit. Nulla aliquet neque at leo ullamcorper, id dapibus libero ultricies. Sed risus nisi, vulputate eu urna id, dictum venenatis ante.

Ut vel magna at dui feugiat posuere. Proin eu tellus mi. Sed elementum congue quam, ut rhoncus est fringilla vel. Etiam placerat, quam id dignissim viverra, odio enim faucibus sem, eget scelerisque elit ligula vitae dolor. Nam nisl libero, laoreet sed sem in, mollis sodales dui. Nunc ut rhoncus lorem. Sed vitae sodales magna. Sed mattis ante in congue vestibulum. Quisque convallis purus sed magna lobortis, sed gravida magna accumsan. Duis consectetur elit a magna vulputate, ac dignissim augue finibus.

Donec accumsan ligula non venenatis interdum. Aliquam gravida lorem at lectus vulputate dictum. In volutpat hendrerit pharetra. Suspendisse in gravida lorem, et eleifend elit. Pellentesque eros sem, ultricies vel dignissim ultrices, commodo ut leo. Maecenas augue eros, fringilla sit amet eros in, molestie fermentum magna. Aenean id elementum risus, quis ultrices leo. Fusce augue est, accumsan vel nisi non, porta tincidunt nibh. Nunc ornare ex eu sem euismod tincidunt. In vel interdum urna. Praesent aliquet magna sed nisi gravida tempus. Nulla vel ex commodo, viverra est at, malesuada nisl. Maecenas placerat eleifend ex, id porta ex. Vivamus gravida odio non leo vehicula, ut tincidunt tortor rhoncus. Duis eget ex volutpat, eleifend eros id, egestas mauris. Curabitur posuere commodo massa, at varius tellus venenatis sed.

Etiam commodo urna a sodales sagittis. Duis sollicitudin, ex vel pharetra malesuada, nibh turpis ultrices ligula, eget convallis neque quam quis tortor. Mauris diam magna, ullamcorper a ante rhoncus, placerat consectetur metus. In hac habitasse platea dictumst. Curabitur neque est, volutpat vel euismod sit amet, mattis at turpis. Ut facilisis nunc sed nisl venenatis, et placerat nisi varius. Suspendisse id risus eu libero placerat blandit. Suspendisse maximus arcu pulvinar quam commodo, ornare accumsan sem porta. Suspendisse quis orci ac risus pulvinar molestie ut nec nisl. Phasellus euismod laoreet diam sollicitudin aliquet. Maecenas arcu risus, pulvinar sit amet augue id, vehicula egestas odio.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce viverra augue id orci dapibus auctor. Etiam non mollis nulla. Pellentesque pulvinar nunc ut lobortis lacinia. Nullam lectus dolor, elementum quis nunc id, venenatis luctus dui. Sed fringilla gravida libero eu scelerisque. Cras commodo odio eget rhoncus blandit. Praesent tincidunt nisl sit amet enim pellentesque consectetur. Proin elementum velit dolor, in cursus lectus pulvinar in. Vivamus vitae sollicitudin ante. Aenean nulla nunc, rutrum vel consequat id, pharetra venenatis nisl. Vivamus malesuada metus id purus vulputate eleifend.

Nam maximus sem eget augue venenatis, at sodales magna blandit. Nunc sagittis laoreet metus, non pretium quam scelerisque ut. Pellentesque tempus nec massa et molestie. Duis quis eros sed justo blandit commodo. Morbi non malesuada velit. Maecenas sed iaculis ligula. Sed tincidunt, nunc eget viverra imperdiet, velit sapien luctus est, nec viverra augue enim ut velit. Praesent tempor purus vel aliquet sagittis. Ut fermentum, lectus quis rutrum gravida, elit ante commodo turpis, sed semper purus neque at justo. Nullam nec augue blandit, malesuada nibh eget, dignissim lorem.

Vivamus sodales porta eleifend. Proin eget rutrum risus. Suspendisse varius, leo ac scelerisque pretium, ligula lacus convallis sapien, at feugiat ligula libero ac velit. Vivamus massa eros, varius ut sem quis, placerat semper eros. Ut est ligula, mollis eu rutrum ut, mollis pellentesque metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras at arcu eleifend, faucibus dolor at, vestibulum justo. Cras imperdiet dui tincidunt, posuere dui sed, venenatis massa. Curabitur sed fermentum felis, quis ultricies sem.

Pellentesque ultricies, tellus id dictum varius, risus orci posuere justo, sed volutpat eros leo quis ante. Proin id nisi dapibus, pulvinar tellus sit amet, efficitur massa. Praesent est sem, venenatis sit amet pellentesque venenatis, aliquet ut eros. Praesent eu nisi eget diam vehicula imperdiet. Sed iaculis cursus ex et finibus. Donec ac pharetra felis. Sed at facilisis ante.

In fringilla feugiat magna sit amet pharetra. Integer id maximus ex, in hendrerit purus. Suspendisse porta erat eu odio dictum, nec tempor felis varius. Praesent porta urna id lectus varius blandit. Integer feugiat iaculis volutpat. Sed a rhoncus sem. Proin tempor accumsan tellus, sit amet rhoncus lorem varius sagittis. Mauris vulputate turpis magna, at scelerisque lectus iaculis at.

Phasellus tristique metus non mollis ullamcorper. Vivamus rhoncus nec elit sit amet convallis. Nullam eu felis non neque ullamcorper feugiat. Sed sem lorem, porta ac nisl nec, ultricies auctor nisi. Praesent tempus nisl a massa rhoncus, nec fringilla odio vestibulum. Pellentesque nec faucibus lorem. Sed vel pretium dui, vitae bibendum ex. Morbi sit amet dui turpis. Duis lacinia consequat massa, sit amet consequat arcu pharetra non. Nam egestas dui et mattis viverra. Suspendisse rutrum dolor libero, eget feugiat dolor consequat sit amet. Donec tempus euismod sapien sed finibus.

Phasellus a condimentum ipsum, quis volutpat erat. Integer libero velit, tempor in tempus blandit, vulputate sit amet tellus. Maecenas tempus vel eros eu rhoncus. Donec mollis ante sed orci imperdiet consequat. Donec at turpis in tortor eleifend dapibus. Phasellus semper in est sit amet ultrices. Donec facilisis dignissim neque id sodales. Aliquam tortor felis, bibendum sit amet sagittis ut, suscipit vel mi. Nulla ut malesuada tellus. Donec a feugiat erat, sit amet tincidunt metus. Proin auctor elit eu nisl pulvinar pretium.

Curabitur pretium dui quam, eu ultrices nisl vestibulum id. Cras egestas condimentum mi et accumsan. Phasellus mollis maximus semper. Mauris lorem ex, convallis et finibus egestas, rhoncus sit amet tellus. Praesent at augue orci. Cras ullamcorper scelerisque velit, sit amet porta nibh tempor at. Morbi posuere maximus risus, quis finibus ligula interdum ut. Mauris laoreet feugiat varius. Donec ultricies, lorem nec iaculis malesuada, nisl tortor consectetur ante, et auctor lectus elit vitae nunc. Etiam nec velit sapien.

';

        $stores = Store::all();

        foreach ($stores as $store){

             FAQ::create([ // start row
                    'store_id' => $store->id,
                    'type' => 'termsAndConditions',

                    'ar' => [
                        'title' => 'شروط واحكام متجرنا في تطبيق المول',
                        'text' => $textAr
                    ],

                    'en' => [
                        'title' => 'Our store terms and conditions in the mall app',
                        'text' => $textEn
                    ],

                ]);// end row



             FAQ::create([ // start row
                    'store_id' => $store->id,
                    'type' => 'HowToBuy',

//                    'ar' => [
//                        'title' => 'كيفية الشراء',
//                        'text' => $textAr
//                    ],

//                    'en' => [
//                        'title' => 'How to buy in our store',
//                        'text' => $textEn
//                    ],
                ]); // end row



            FAQ::create([ // start row
                    'store_id' => $store->id,
                    'type' => 'RequestSpecialDiscount',

                    'ar' => [
                        'title' => 'طلب خصم خاص علي احد منتجاتنا عن طريق الواتس',
                        'text' => $textAr
                    ],

                    'en' => [
                        'title' => 'Request a discount on one of our products via WhatsApp',
                        'text' => $textEn
                    ],
                ]); // end row


            FAQ::create([ // start row
                    'store_id' => $store->id,
                    'type' => 'TermsAndConditions',

                    'ar' => [
                        'title' => 'الشروط والاحكام',
                        'text' => $textAr
                    ],

                    'en' => [
                        'title' => 'Terms and Conditions',
                        'text' => $textEn
                    ],
                ]); // end row

            FAQ::create([ // start row
                    'store_id' => $store->id,
                    'type' => 'ReplacementAndTerms',
                    'ar' => [
                        'title' => 'طريقة استرجاع منتج',
                        'text' => $textAr
                    ],

                    'en' => [
                        'title' => 'How to return a product',
                        'text' => $textEn
                    ],
                ]); // end row
        }
    }
}
