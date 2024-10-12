<?php
namespace Database\Seeders;
use App\Models\Admin;
use App\Models\categories;
use App\Models\companies_type;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserMedal;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use function PHPSTORM_META\map;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // companies_type::query()->create([
        //    'name'=>'حر',
        //     'status'=>1
        // ]);

        //Admin Seeder
         Admin::create([
            'name' => 'OmarMahgoub',
            'email' => 'omar@app.com',
            'password' => bcrypt('123456'),
             'role'=>'0',
             'status'=>0
        ]);

         Admin::create([
            'name' => 'Fares',
            'email' => 'fares@for-engineer.net',
            'password' => bcrypt('123456@For'),
             'role'=>'1',
             'status'=>1
        ]);

         User::create([
            'name' => 'Omar Mahgoub',
            'email' => 'hhomar2013@gmail.com',
            'password' => bcrypt('011215'),
             'status'=>1
        ]);

        UserMedal::create([
            'name'=>[
                'ar' =>'عضو جديد',
                'en' => 'New Commer'
            ],
            'img'=>'medals/1.png',
            'user_id' =>1,
        ]);

        companies_type::query()->create([
            'name'=>'شركات و مكاتب',
            'status'=>1,
        ]);
        companies_type::query()->create([
            'name'=>'مهندسون مستقلون',
            'status'=>1,
        ]);


        for ($i=1; $i <= 20 ; $i++) {
            Company::create([
                'name' => 'eng' .$i,
                'email' => 'company'.$i.'@app.com',
                'password' => bcrypt('123456'),
                'ct_id'=>2,
                'status'=>1
            ]);
        }

        Company::create([
            'name' =>'Company',
            'email' => 'company@app.com',
            'password' => bcrypt('123456'),
            'ct_id'=>1,
            'status'=>1
        ]);
        categories::query()->create([
            'name'=> [
                'ar'=> "أستشارات",
                'en' =>"Consoltants"
            ],
            'icone'=> "home",
            'status'=>1
        ]);

        categories::query()->create([
            'name' => [
                'ar' => 'أستشاره فنية',
                'en' => 'Technical consultation'
            ],
            'info'=>[
                'ar'=> '<p>الاستشارة الفنية هي عملية تقديم المساعدة أو النصح من قبل خبراء أو مستشارين متخصصين في مجال معين لتوفير حلول فنية لمشاكل أو تحديات تواجه الأفراد أو الشركات. تشمل الاستشارة الفنية عدة جوانب، منها:</p>
                <ol>
                <li>
                <p><strong>تشخيص المشاكل</strong>: يقوم المستشار الفني بفحص وتحليل الوضع الحالي لتحديد المشكلات والأسباب الجذرية.</p>
                </li>
                <li>
                <p><strong>تقديم الحلول</strong>: بعد التشخيص، يقدم المستشار الفني توصيات وحلول فنية تعتمد على خبرته ومعرفته العميقة بالمجال.</p>
                </li>
                <li>
                <p><strong>تنفيذ الحلول</strong>: قد يساعد المستشار الفني في تطبيق وتنفيذ الحلول المقترحة لضمان تحقيق النتائج المرجوة.</p>
                </li>
                <li>
                <p><strong>التدريب والتوجيه</strong>: يمكن أن يقدم المستشار الفني تدريباً وتوجيهاً للموظفين أو الأفراد لضمان فهمهم الكامل للحلول وكيفية تطبيقها بفعالية.</p>
                </li>
                <li>
                <p><strong>التقييم والتحسين المستمر</strong>: يقوم المستشار الفني بمتابعة تنفيذ الحلول وتقييم النتائج، ثم يقدم اقتراحات للتحسين المستمر.</p>
                </li>
                </ol>
                <h2>مجالات الاستشارة الفنية</h2>
                <p>الاستشارة الفنية تشمل مجالات متعددة، مثل:</p>
                <ul>
                <li><strong>تكنولوجيا المعلومات</strong>: تقديم الدعم في تصميم وتنفيذ الأنظمة والشبكات، تطوير البرمجيات، وتحليل البيانات.</li>
                <li><strong>الهندسة</strong>: تقديم حلول في مجالات الهندسة المدنية، الميكانيكية، الكهربائية، وغيرها.</li>
                <li><strong>التصنيع والإنتاج</strong>: تحسين عمليات الإنتاج، تقليل التكاليف، وزيادة الكفاءة.</li>
                <li><strong>البيئة والطاقة</strong>: تقديم حلول لتحسين كفاءة استخدام الطاقة، والامتثال للمعايير البيئية.</li>
                </ul>
                <h2>فوائد الاستشارة الفنية</h2>
                <ol>
                <li><strong>توفير الوقت والموارد</strong>: بفضل الخبرة المتخصصة، يمكن تحقيق حلول فعالة بسرعة أكبر.</li>
                <li><strong>تحقيق نتائج أفضل</strong>: الخبراء الفنيون يقدمون حلولاً مبتكرة تعتمد على أفضل الممارسات.</li>
                <li><strong>تجنب الأخطاء المكلفة</strong>: الاستفادة من خبرة المستشارين يمكن أن تساعد في تجنب الأخطاء المكلفة.</li>
                <li><strong>التكيف مع التكنولوجيا الحديثة</strong>: المساعدة في مواكبة التطورات التقنية وتطبيقها بفعالية.</li>
                </ol>
                <p>الاستشارة الفنية تعتبر جزءًا أساسيًا من استراتيجية الشركات والأفراد الذين يسعون لتحسين أداءهم وتحقيق أهدافهم بكفاءة وفعالية.</p>',
                'en' => '<p>A technical consultation is the process of providing expert advice or guidance in a specialized field to help individuals or businesses address specific technical challenges or issues. It involves several key aspects:</p>
                <ol>
                <li>
                <p><strong>Problem Diagnosis</strong>: The technical consultant assesses the current situation to identify underlying problems and their causes.</p>
                </li>
                <li>
                <p><strong>Solution Offering</strong>: After diagnosis, the consultant provides recommendations and solutions based on their expertise and in-depth knowledge of the field.</p>
                </li>
                <li>
                <p><strong>Solution Implementation</strong>: The consultant may assist in the application and implementation of the proposed solutions to ensure desired outcomes are achieved.</p>
                </li>
                <li>
                <p><strong>Training and Guidance</strong>: Consultants often provide training and support to ensure that individuals or teams understand the solutions and can implement them effectively.</p>
                </li>
                <li>
                <p><strong>Evaluation and Continuous Improvement</strong>: The consultant monitors the implementation of solutions and evaluates the results, offering suggestions for continuous improvement.</p>
                </li>
                </ol>
                <h2>Areas of Technical Consultation</h2>
                <p>Technical consultation spans various industries, including:</p>
                <ul>
                <li><strong>Information Technology</strong>: Assisting with the design and implementation of systems and networks, software development, and data analysis.</li>
                <li><strong>Engineering</strong>: Offering solutions in civil, mechanical, electrical, and other engineering fields.</li>
                <li><strong>Manufacturing and Production</strong>: Improving production processes, reducing costs, and enhancing efficiency.</li>
                <li><strong>Environmental and Energy</strong>: Providing solutions for improving energy efficiency and complying with environmental standards.</li>
                </ul>
                <h2>Benefits of Technical Consultation</h2>
                <ol>
                <li><strong>Time and Resource Savings</strong>: With specialized expertise, solutions can be found more quickly and efficiently.</li>
                <li><strong>Improved Outcomes</strong>: Experts provide innovative solutions based on best practices.</li>
                <li><strong>Avoiding Costly Mistakes</strong>: Utilizing the experience of consultants helps in preventing costly errors.</li>
                <li><strong>Adapting to Modern Technologies</strong>: Consultants help in keeping up with technological advancements and applying them effectively.</li>
                </ol>
                <p>Technical consultation is essential for individuals and organizations seeking to enhance their performance and achieve their goals efficiently and effectively.</p>'
            ],
            'icone'=>'engineering',
            'status'=>1,
            'parent_id'=>1
        ]);

        categories::query()->create([
            'name'=>[
                'ar'=>'أستشارة هندسية',
                'en'=>'Engineering consulting',
            ],
            'info'=>[
                'ar'=>'<p>الاستشارة الهندسية هي خدمة يقدمها المهندسون المتخصصون بهدف تقديم المشورة الفنية والمهنية لمساعدة الأفراد أو الشركات أو الهيئات في تحقيق مشاريعهم الهندسية أو حل مشكلاتهم الفنية. تتضمن هذه الاستشارة تقييمًا شاملاً للوضع الحالي، وتقديم توصيات مستندة إلى الخبرة والمعرفة الهندسية لتصميم أو تحسين أو تنفيذ المشاريع بشكل فعال وآمن ووفقًا للمعايير المطلوبة.</p>
                    <p>تشمل مجالات الاستشارة الهندسية العديد من التخصصات مثل:</p>
                    <ul>
                    <li>الهندسة المعمارية</li>
                    <li>الهندسة المدنية</li>
                    <li>الهندسة الكهربائية</li>
                    <li>الهندسة الميكانيكية</li>
                    <li>هندسة البيئة</li>
                    <li>هندسة الاتصالات</li>
                    </ul>
                    <p>عادة ما تغطي الاستشارة الهندسية ما يلي:</p>
                    <ol>
                    <li><strong>تحليل المشكلة أو المشروع</strong>: فهم التحديات والاحتياجات الفنية.</li>
                    <li><strong>تقديم الحلول</strong>: اقتراح حلول تقنية وتصميمية قائمة على المعرفة والخبرة.</li>
                    <li><strong>التقييم المالي</strong>: تقدير التكاليف المحتملة والإمكانات المتاحة.</li>
                    <li><strong>التوجيه خلال مراحل التنفيذ</strong>: تقديم المشورة خلال تنفيذ المشروع ومتابعته لضمان تحقيق الأهداف بنجاح.</li>
                    </ol>',
                'en'=>'<p>Engineering consulting is a service provided by specialized engineers to offer technical and professional advice to individuals, companies, or organizations. The goal is to assist in executing engineering projects or solving technical problems. This consultation involves a comprehensive evaluation of the current situation and recommendations based on engineering expertise to design, improve, or implement projects effectively, safely, and in accordance with required standards.</p>
                    <p>Engineering consulting spans across various fields, such as:</p>
                    <ul>
                    <li>Architecture</li>
                    <li>Civil engineering</li>
                    <li>Electrical engineering</li>
                    <li>Mechanical engineering</li>
                    <li>Environmental engineering</li>
                    <li>Telecommunications engineering</li>
                    </ul>
                    <p>Typically, engineering consulting covers the following aspects:</p>
                    <ol>
                    <li><strong>Problem or project analysis</strong>: Understanding the technical challenges and requirements.</li>
                    <li><strong>Solution proposals</strong>: Offering technical and design solutions based on knowledge and experience.</li>
                    <li><strong>Financial evaluation</strong>: Estimating potential costs and available resources.</li>
                    <li><strong>Guidance during implementation</strong>: Providing advice throughout the project&rsquo;s execution to ensure successful outcomes.</li>
                    </ol>'
            ],
            'status'=>1,
            'parent_id'=>1
        ]);

    }
}
