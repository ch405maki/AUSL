<template>
    <MainLayout>
      <Head title="Curriculum" />
      <div class="flex flex-col min-h-screen">
        <main class="flex-grow">
          <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row w-full justify-center">
                <div class="w-full md:w-2/2 p-2">
                <Header>Course Description</Header>
                <div v-for="semester in subjects" :key="semester.name" class="grid grid-flow-col text-center rounded-lg mt-8 mb-8">
                  <table class="w-full text-sm text-left text-gray-500">
                    <thead class="">
                      <tr>
                        <th colspan="2" class="py-3 text-left text-lg font-bold sm:text-2xl text-official-purple-800">
                          {{ semester.name }}
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(subject, index) in semester.subjects" :key="index" class="border-b odd:bg-white even:bg-gray-50">
                        <th scope="row" class="py-2 text-lg font-normal text-gray-600 whitespace-wrap">
                          <div class="group">
                            <summary
                                class="flex cursor-pointer list-none items-center  text-lg font-medium text-secondary-900 text-official-purple-800">
                                {{subject.name}} <span class="italic"> &nbsp; / {{ subject.units }} units</span> 
                            </summary>
                            <div class="pb-4 pl-2 mt-2 text-secondary-500"><p v-html="subject.description"></p></div>
                        </div>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="w-full md:w-1/3 p-2 flex justify-start">
                  <div class="text-left">
                    <div class="mb-8 sm:mt-4 md:mt-8 lg:mt-10 xl:mt-12">
                      <h1 class="text-purple-900 text-lg font-medium mb-4">Related Links</h1>
                      <hr class="mb-4 border-1 border-purple-900">
                      <ul class="list-inside list-disc">
                        <li v-for="(item, index) in links" :key="index" class="mb-2">
                          <a :href="item.url" class="text-lg font-normal text-gray-600 hover:text-slate-900">{{ item.text }}</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </MainLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import MainLayout from '@/Layouts/MainLayout.vue';
  import Header from '../../Components/Header.vue';
  
  const links = ref([
  { text: 'JD/Curiculum', url: '#event2' },
  { text: 'Refresher/Curiculum', url: '#event2' },
  { text: 'Academic Guidelines', url: 'https://aims.arellanolaw.edu/aims/students/' },
  { text: 'Bar Review', url: '#event3' },
  { text: 'MCLE', url: '#event4' },
  ]);
  
  
  const subjects = ref([
  {
    name: 'First Year - First Semester',
    subjects: [
      { 
        name: 'Philosophy of Law',
        description: 'A study of the historical roots of law from Roman times, the schools of legal thought that spurred the growth and development of law, and the primordial purpose of law and legal education',
        units: 2,
        showDescription: false
      },
      { 
        name: 'Statutory Construction',
        description: 'A course that explores the use and force of statutes and the principles and methods of their construction and interpretation. The course also includes a discussion on the language of the law, and the interpretation and effectivity of laws as provided under the Civil Code.',
        units: 2,
        showDescription: false
      },
      { 
        name: 'Basic Legal and Judicial Ethics',
        description: 'This course focuses on the canons of legal ethics, pertinent provisions of laws and rules on norms of conduct, and other similar principles involving the duties and responsibilities of the lawyer and law student practitioners with respect to the public or society, the Bar or legal profession, the Courts and the client. The course also covers the ethical norms of conduct for the members of the judiciary, whether judicial or non-judicial. This course is an enhancement of the previous Basic Legal Ethics course.',
        units: 3,
        showDescription: false
      },
      { 
        name: 'Constitutional Law I',
        description: 'Alternatively entitled as Foundations and Principles of the Philippine State, it entails a survey and evaluation of basic political foundations of the structure of the Philippine Government, and the policies, principles and powers of the Philippine state. The course also covers all other constitutional provisions except those covered in Constitutional Law II.',
        units: 4,
        showDescription: false
      },
      { 
        name: 'Criminal Law I',
        description: 'The course covers Articles 1-113 of the Revised Penal Code and related laws. <br><br> Alternatively entitled as Foundations and Principles of Criminal Law, it is a detailed examination into the characteristics of criminal law, the nature of felonies, stages of execution, circumstances affecting criminal liability, persons criminally liable; the extent and extinction of criminal liability as well as the understanding of penalties in criminal law, their nature and theories, classes, crimes, habitual delinquency, juvenile delinquency, the Indeterminate Sentence Law and the Probation Law.',
        units: 4,
        showDescription: false
      },
      { 
        name: 'Criminal Procedure',
        description: 'A study of the procedural rules governing the investigation, trial, and disposition of criminal cases in court, including jurisdiction of courts in criminal cases and independent civil actions. The course also develops familiarity with relevant legal forms. The course explicitly integrates medical jurisprudence.',
        units: 3,
        showDescription: false
      }
    ],
    totalUnits: 18
  },
  {
      name: 'First Year - Second Semester',
      subjects: [
        { 
          name: 'Legal Research and Writing', 
          units: 2,
          description: 'The course introduces the structures to the methodology of legal research and the preparation of legal opinions, memoranda, or expository or critical paper on any subject approved by the law faculty member. It also includes legal writing technique and style; it involves applied legal bibliography, case digesting and reporting analysis, and legal reasoning. The course also provides an overview of legal communications.'
        },
        { 
          name: 'Constitutional Law II', 
          units: 3,
          description: 'Alternatively entitled as Constitutional and Human Rights, it is a comprehensive study of the Bill of Rights, other constitutional rights and judicial review of the acts affecting them. The course also emphasizes the importance of gender and child sensitivity under the equal protection clause and in the aspects of protecting, defending and redressing violations of human rights in the Philippines.'
        },
        { 
          name: 'Criminal Law II', 
          units: 4,
          description: 'Prerequisite: Criminal Law I <br><br> Alternatively entitled as Crimes and Penalties, it is a study of the important felonies penalized in Book II of the Revised Penal Code as amended, and the important and common crimes found in special penal laws, their nature, elements and corresponding penalties. The course is an enhancement of the previous Criminal Law II course.'
        },
        { 
          name: 'Obligations and Contracts', 
          units: 5,
          description: 'An in-depth study of the nature, kinds and effect of obligations and their extinguishment; contracts in general, their requisites, form and interpretation; defective contracts, quasi contracts, natural obligations, and estoppel. The course also covers civil code provisions on Sales as a special contract; the application of provisions of contracts and obligations in contract of sales and the special rules under Art.1458-1637 which are applicable to sales only. The course is an enhancement of the previous Obligations and Contracts course through the integration of the basics of the law on sales.'
        },
        { 
          name: 'Civil Procedure I', 
          units: 3,
          description: 'A study on the interplay of procedural laws in the resolution of civil disputes, with an in depth focus on the jurisdiction in civil actions, Rules 1 to 39 of the 1997 Rules of Court as amended, and small claims. The course also includes discussion of appropriate modes of dispute resolution such as mediation, barangay conciliation and the like. The study of the rules is supplemented by a study of applicable jurisprudence. The course also develops familiarity with relevant legal forms.'
        }
      ],
      totalUnits: 17
    },
  {
    name: 'Summer',
    subjects: [
      { name: 'Clinical Legal Education Program I',
        description:'120 hours during summer break <br><i>*Note: All First Year subjects must be taken and passed. (Pursuant to Rule 138-A)</i><br><br> The course introduces students to a limited practice of law as required under Rule 138-A of the Rules of Court, including the ethical considerations of lawyering. It may cover, depending on the certification level of law student practitioners, court appearances, drafting and submission of pleadings and documents before trial and appellate courts and quasi-judicial and administrative bodies. It also covers assisting in mediation and other modes of alternative or appropriate dispute resolution, legal counseling and advice, and such other activities as may designed under the Clinical Legal Education Program of the LEI’s law clinic. The course also includes apprenticeship, externship and internship programs. The course may be offered at any year beginning the first semester of Year 2.',
        units: 2 },
    ],
    totalUnits: 2
  },
  {
      name: 'Second Year - First Semester',
      subjects: [
        { 
          name: 'Public International Law', 
          units: 3,
          description: 'Prerequisite: Constitutional Law I <br><br> A study of the general principles of international law and an overview of the legal principles governing international relations based, among others, on the United Nations Charter, treaty law, the doctrines of well known and recognized publicists, and the decisions of international tribunals and bodies.'
        },
        { 
          name: 'Persons & Family Law', 
          units: 4,
          description: 'A basic course on the law of persons and the family that first examines the effect and application of laws, and then proceeds to deal with the legal norms affecting civil personality, marriage, property relations between husband and wife, legal separation, the matrimonial regimes of absolute community, conjugal partnership of gains, and complete separation of property; paternity and filiation, adoption, guardianship, support, parental authority, surnames, absence and emancipation.'
        },
        { 
          name: 'Civil Procedure II', 
          units: 3,
          description: 'Prerequisite: Civil Procedure I <br><br> A study on the interplay of procedural laws in the resolution of civil disputes, with an in depth focus on Rules 40 to 71 of the 1997 Rules of Court as amended, including Provisional Remedies. The study of the rules is supplemented by a study of applicable jurisprudence. The course also develops familiarity with relevant legal forms.'
        },
        { 
          name: 'Agency, Trust and Partnership Law', 
          units: 2,
          description: 'Prerequisite: Obligations and Contracts <br><br> A course focusing on important provisions of the Civil Code on Agency (Title X), Partnership (Title IX) and Trusts (Title V).'
        },
        { 
          name: 'Corporation and Basic Securities Law', 
          units: 3,
          description: 'A study of the key principles governing private corporations, including foreign corporations and the concept of doing business in the Philippines as found in the Corporation Code and other special laws. The course also includes an analysis of the applicable common law and commercial principles underlying the various relationships in the corporate setting, including joint ventures, with emphasis on the corporation being a medium for business enterprise and a means of providing for the equity investment market. The course includes the study of the basic and pertinent provisions of the Securities Regulation Code.'
        },
        { 
          name: 'Labor Law and Social Legislation', 
          units: 4,
          description: 'Prerequisite: Constitutional Law II <br><br> A study of social legislation laws with a particular focus on labor rights and welfare. The course also touches on important provisions and jurisprudence on labor standards and relations under the Labor Code and special laws, as well as an introduction in the Rules of Procedure of the National Labor Relations Commission. The course also surveys social justice legislation to highlight the special protections for vulnerable sectors, key principles of agrarian reform laws, and welfare laws such as SSS and GSIS laws. The course is an integration of the previous Labor Law I, Labor Law II and Agrarian Law and Social Legislation courses.'
        }
      ],
      totalUnits: 19,
    },
    {
      name: 'Second Year - Second Semester',
      subjects: [
        { 
          name: 'Administrative Law and Law on Public Officers', 
          units: 2,
          description: 'Prerequisite: Constitutional Law I <br><br> The course will survey the interplay of key laws that deal with public office and civil service covering the basic principles and doctrines governing administrative agencies, and the essential standards and rules applicable to public servants.'
        },
        { 
          name: 'Property and Land Law', 
          units: 4,
          description: 'A course offering the study and analysis of the basic laws on property, including different classification of property and the modes of acquiring ownership. The course also covers the important principles governing titles and registration of real property under the Public Land Act. The course also integrates the key principles, discussion of important updates and trends and the relevant legal forms. The course is an integration of the previous Property, and Land Titles and Deeds courses.'
        },
        { 
          name: 'Basic Succession Law', 
          units: 4,
          description: 'Prerequisite: Persons and Family Law <br><br> The course covers the introduction to the law on Succession, which focus on the examination and analysis of the basic and key provisions of the law on testate and intestate succession. The course also takes up the basic rules of procedure on the settlement and administration of the estate of deceased persons. The course integrates the key principles, discussion of important updates and trends and the relevant legal forms for the course.'
        },
        { 
          name: 'Evidence', 
          units: 3,
          description: 'Prerequisites: Criminal Procedure, and, Civil Procedure I and II <br><br> A course which looks into the rules of presentation, admissibility, and weight and sufficiency of evidence, including burden of proof and presumption. It also covers medical jurisprudence on forensic and evidence gathering. The course also develops familiarity with relevant legal forms.'
        },
        { 
          name: 'Commercial Laws I', 
          units: 3,
          description: 'Prerequisite: Obligations and Contracts, and Corporation and Basic Securities Law A <br><br> survey of the important principles and concepts of basic laws on commercial transactions, with a particular focus on Civil Code provisions on loans, mortgages, pledges and guaranty, and similar credit transactions, as amended by the Personal Property Securities Act. Additionally, the course integrates discussion on relevant provisions of laws on banking, negotiable instruments and financial rehabilitation.'
        },
        { 
          name: 'Basic Taxation Law', 
          units: 3,
          description: 'The course covers the constitutional aspects of taxation, and general principles of income, transfer and local taxation. The course also provides a general survey of concepts and principles underlying the key taxes provided in the National Internal Revenue Code, as amended.'
        }
      ],
      totalUnits: 19,
    },
    {
      name: 'Third Year - First Semester',
      subjects: [
        { 
          name: 'Laws on Local Government', 
          units: 2,
          description: 'Prerequisite: Constitutional Law I <br><br> This is a study of the general principles governing local governments. The course also covers the laws affecting the creation, organization and government of provinces, cities, municipalities, municipal districts, and barangays; the scope and application of the powers of municipal corporations, including municipal ordinances, contracts, liabilities, and enterprises; as well as the laws on autonomous regions, and the National Capital Region.<br><br>Prerequisite: Constitutional Law I'
        },
        { 
          name: 'Environmental and Natural Resources Law', 
          units: 2,
          description: 'Resources Law <br><br> A study of the constitutional provisions, international conventions, and special laws protecting the environment and the ecosystem. The study includes existing laws governing the use and disposition of natural resources, as well as prevailing rules that are geared towards stemming climate change.'
        },
        { 
          name: 'Torts and Damages', 
          units: 2,
          description: 'Prerequisite: Obligations and Contracts <br><br> The course focuses on the analysis of the law on quasi-delicts as well as the nature, classes and extent of damages. It includes discussions on the principle of Abuse of Rights under the civil code provisions on Human Relations. The course explicitly integrates medical jurisprudence.<br><br>Prerequisite: Obligations and Contracts'
        },
        { 
          name: 'Private International Law', 
          units: 2,
          description: 'Prerequisites: Persons and Family Law, Obligations and Contracts, Agency, Trust and Partnership Law, Corporation and Basic Securities Law, Labor Law and Social Legislation, Basic Succession Law, Property and Land Law, Commercial Laws I, and Basic Taxation Law <br><br> A course dealing with legal transactions with emphasis on the choice of law, including problems on jurisdiction and the recognition and enforcement of foreign judgments.<br><br>Prerequisites: Persons and Family Law, Obligations and Contracts, Agency, Trust and Partnership Law, Corporation and Basic Securities Law, Labor Law and Social Legislation, Basic Succession Law, Property and Land Law, Commercial Laws I, and Basic Taxation Law'
        },
        { 
          name: 'Special Rules and Proceedings', 
          units: 3,
          description: 'Prerequisite: Basic Succession Law <br><br> A study of Rules 72-109 of the Revised Rules of Court dealing with the procedural rules on the settlement of estate, will, letters testamentary and administration, escheats, guardianship, appointment of trustees, adoption, change of name, cancellation and correction of entries in the Civil Registry and appeals on special proceedings and the special rules under the Family Code on special proceedings. The course similarly surveys important special rules outside of the rules of court such as those in environmental and commercial cases. The course also develops familiarity with relevant legal forms.<br><br>Prerequisite: Basic Succession Law'
        },
        { 
          name: 'Commercial Laws II', 
          units: 4,
          description: 'Prerequisite: Obligations and Contracts, and Corporation and Basic Securities Law <br><br> A survey of emerging and relevant commercial laws dealing with public interest, including Transportation Law, Insurance Law, Intellectual Property Code, Competition Act, and Data Privacy Act.<br><br>Prerequisite: Obligations and Contracts, and Corporation and Basic Securities Law'
        },
        { 
          name: 'Legal Forms', 
          units: 2,
          description: 'The course links knowledge and application on the various legal documents and forms used in practice, pleading and procedure, as well as in conveyancing. It also includes various forms specifically used for commercial transactions.'
        }
      ],
      totalUnits: 17,
    },
    {
      name: 'Third Year - Second Semester',
      subjects: [
        { 
          name: 'Election Laws', 
          units: 1,
          description: 'Prerequisite: Constitutional Law I <br><br> The course covers the laws regulating the conduct of elections, and the law on preproclamation contests and election protests, and as well as related jurisprudence.'
        },
        { 
          name: 'Medical Jurisprudence', 
          units: 1,
          description: 'Prerequisite course: Evidence <br><br> The course provides an overview of the principles relating to medico-legal cases, including the procedure of presenting and examining a medical expert witness.'
        },
        { 
          name: 'Gender Sensitivity and Laws on Women and Children\'s Rights', 
          units: 2,
          description: 'The course seeks to provide students with a keen understanding of gender and child sensitivity and equality and nondiscrimination. Feminist legal theories and international instruments relating to women’s and children’s rights will be examined and analyzed. The course also introduces the students to the legal framework of protection for women and children, and the psycho-social dimensions of handling their cases. Focus will also be given on institutions that create, maintain and perpetuate gender inequalities and child abuse, in particular the legal framework and how it contributes to the institutionalization of gender differences. Special issues and concerns, such as rights of indigenous women and children, violence against women and children, sexual harassment and human trafficking, will be highlighted to provide illustrations of how discrimination and abuse occur.'
        },
        { 
          name: 'Special Penal Laws (Elective)', 
          units: 2,
          description: ''
        },
        { 
          name: 'Special Commercial Laws (Elective)', 
          units: 2,
          description: ''
        },
        { 
          name: 'Special Labor Laws (Jurisdiction & Jurisprudence) (Elective)', 
          units: 2,
          description: ''
        },
        { 
          name: 'Advance Taxation (Elective)', 
          units: 2,
          description: ''
        },
        { 
          name: 'Human Rights Law', 
          units: 2,
          description: ''
        }
      ],
      totalUnits: 14,
    },
    {
      name: 'Summer',
      subjects: [
        { name: 'Clinical Legal Education Program II',
        description: '120 hours during summer break; 2 units <br><i> *Note: All First Year and Third Year subjects must be taken and passed. (Pursuant to Rule 138-A)</i><br><br> As a condition for graduation, students are required to undergo Clinical Legal Education Program (CLEP) for a minimum of 120 hours. The program may be undertaken in one or two semesters after a student has completed two semesters of Third Year.',
        units: 2 },
      ],
      totalUnits: 2
    },
    {
      name: 'Fourth Year - First Semester',
      subjects: [
        { 
          name: 'Political and International Law Review and Integration', 
          units: 5,
          description: 'Prerequisites: Constitutional Law I and II, Administrative Law and Law on Public Officers, Election Laws, Laws on Local Government, and Public International Law <br><br> A review course intended for bar examinees focusing on constitutional law, including political law, administrative law, electoral laws and related subjects. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Civil Law Review and Integration', 
          units: 6,
          description: 'Prerequisites: Persons and Family Law, Obligations and Contracts, Property and Land Law, Basic Succession Law, Torts and Damages, and Private International Law <br><br> A review course intended for bar examinees focusing on civil law, including persons and family law, obligations and contracts, basic succession, laws on property and titles, private international law, torts and related subjects. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Criminal Law Review and Integration', 
          units: 3,
          description: 'Prerequisites: Criminal Law I and II <br><br> A review course intended for bar examinees focusing on criminal laws, important and common special penal laws and related jurisprudence. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Labor Law Review and Integration', 
          units: 3,
          description: 'Prerequisite: Labor Law and Social Legislation <br><br> A review course intended for bar examinees focusing on labor laws, social legislation and related jurisprudence. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        }
      ],
      totalUnits: 17,
    },
    {
      name: 'Fourth Year - Second Semester',
      subjects: [
        { 
          name: 'Legal & Judicial Ethics & Practical Exercises Review and Integration', 
          units: 2,
          description: 'Prerequisites: Legal Forms, and Basic Legal and Judicial Ethics <br><br> A review course intended for bar examinees focusing on problem areas and advanced topics in legal and judicial ethics, as well as related jurisprudence. The course also centers on problem solving through application of the legal canons. It also provides survey and review of key legal forms and memoranda. More importantly, the course provides integration of key principles, and discussion of updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Remedial Law Review and Integration', 
          units: 6,
          description: 'Prerequisite: Criminal Procedure, Civil Procedure I and II, Evidence, and Special Rules and Proceedings <br><br> A review course intended for bar examinees focusing on remedial laws, particularly those found under the Rules of Court, and related statutes, other sources of procedural law, as well as relevant jurisprudence. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Commercial Law Review and Integration', 
          units: 5,
          description: 'Prerequisites: Agency, Trust and Partnership Law, Corporation and Basic Securities Law, and, Commercial Laws I and II <br><br> A review course intended for bar examinees focusing on commercial laws and related jurisprudence. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.'
        },
        { 
          name: 'Taxation Law Review and Integration', 
          units: 3,
          description: 'A review course intended for bar examinees focusing on taxation laws and related jurisprudence. More importantly, the course provides integration of key principles, and discussion of important updates on jurisprudence and trends as may be projected to be covered in the bar examinations.<br><br>Prerequisite: Basic Taxation Law'
        }
      ],
      totalUnits: 16,
    }
  ]);
  </script>
  
  <style scoped>
  @import url('https://db.onlinewebfonts.com/c/14ab77252fbc4bdca1dbdf8051cb7e96?family=BF+Invicta+W00+Bold');
  
  .text-invicta {
  font-family: 'BF Invicta W00 Bold', sans-serif;
  }
  </style>
  