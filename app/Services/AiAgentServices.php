<?php

namespace App\Services;

class AiAgentServices
{
    public static function all(): array
    {
        return [
            'marketing-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'marketing-search',
                'name' => 'Marketing AI Agent',
                'short_desc' => 'Supports campaign planning, audience-focused content preparation, promotional copy drafts, and governed marketing workflows.',
                'target_keyword' => 'marketing AI agent development',
                'meta_title' => 'Marketing AI Agent Development | TC Smart Technology',
                'meta_description' => 'Governed AI agent for marketing campaign planning, promotional drafts, content calendars and human-approved marketing workflows.',
                'icon' => 'fa-bullhorn',
                'is_priority' => false,
                'problem' => 'Marketing teams spend excessive hours drafting campaign variations, social copy, and product announcements without standardized brand voice adherence.',
                'outcome' => 'An authorized marketing AI agent that generates brand-aligned campaign briefs, multi-channel copy drafts, and publishing calendars for human review.',
                'capabilities' => [
                    'Campaign brief synthesis from product feature sheets and target buyer personas',
                    'Multi-channel copy drafting: email newsletters, promotional blurbs, social snippets',
                    'Content calendar organization with theme suggestions and publication milestones',
                    'Enforcement of brand tone, prohibited terminology, and approved messaging pillars',
                    'Human-in-the-loop approval workflow: no content is published without authorized sign-off',
                    'Audit logging of generated drafts and revisions for team transparency'
                ],
                'technical_approach' => 'We connect your approved brand guide and product documents to a governed LLM orchestration pipeline with strict prompt guardrails. Outputs are delivered to your marketing workspace for review.',
                'deliverables' => [
                    'Configured Marketing AI Agent integrated with your workspace',
                    'Custom brand guidelines prompt template and guardrail rules',
                    'Human review and editorial approval interface',
                    'User administration and token usage monitoring documentation'
                ],
                'inputs_needed' => 'Brand style guide, approved product sheets, target audience definitions, and preferred content formatting templates.',
                'limitations' => 'The AI agent generates drafts; all final claims, creative decisions, budgets, and publishing actions must remain under authorized human control. Does not guarantee campaign conversions.',
                'faqs' => [
                    [
                        'q' => 'Does the marketing agent post content automatically to our channels?',
                        'a' => 'No. Strict human-control guardrails ensure all drafts require review and approval by your marketing team before publication.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'seo-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'marketing-search',
                'name' => 'SEO AI Agent',
                'short_desc' => 'Organizes search intent, SEO content briefs, title and meta-description drafts, internal link suggestions, and optimization tasks.',
                'target_keyword' => 'SEO AI agent development',
                'meta_title' => 'SEO AI Agent Development | TC Smart Technology',
                'meta_description' => 'Controlled SEO AI agent for keyword clustering, content briefs, meta tag drafts and internal link architecture.',
                'icon' => 'fa-search',
                'is_priority' => false,
                'problem' => 'Manual search intent clustering, drafting SEO briefs, and maintaining internal linking structures across dozens of technical pages is slow and inconsistent.',
                'outcome' => 'A governed SEO agent that organizes search intent, structures data-driven content briefs, and suggests internal linking opportunities for content teams.',
                'capabilities' => [
                    'Keyword intent clustering: informational, commercial, transactional categorization',
                    'Structured SEO brief generation: heading hierarchy (H1, H2, H3), key entities, FAQs',
                    'Drafting compliant meta titles and descriptions adhering to length limits',
                    'Internal link recommendation based on site taxonomy and topic clusters',
                    'Content refresh gap analysis against approved competitor benchmarks',
                    'Clear adherence to search engine quality guidelines (no keyword stuffing)'
                ],
                'technical_approach' => 'The agent processes keyword data and top-ranking search structures through semantic clustering models, generating structured briefs formatted for your content creators.',
                'deliverables' => [
                    'SEO AI Agent workflow deployment',
                    'Custom brief generation templates configured for your industry terminology',
                    'Internal linking suggestion module',
                    'Content editor guidelines and prompt documentation'
                ],
                'inputs_needed' => 'Target keyword lists, website URL inventory, primary competitor URLs, and brand editorial guidelines.',
                'limitations' => 'The agent provides research and draft briefs; it does not promise or guarantee Google rankings, search traffic, or revenue. Recommendations must be verified by human SEO specialists.',
                'faqs' => [
                    [
                        'q' => 'Can this agent guarantee page-one Google rankings?',
                        'a' => 'No reputable SEO service can guarantee rankings. The agent assists with structural intent analysis, brief organization, and compliance with best practices.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'website-audit-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'marketing-search',
                'name' => 'Website Audit AI Agent',
                'short_desc' => 'Reviews approved crawl data, page inventories, and audit inputs to organize technical, content, and on-page SEO actions.',
                'target_keyword' => 'website audit AI agent',
                'meta_title' => 'Website Audit AI Agent | TC Smart Technology',
                'meta_description' => 'Automated website audit analysis: crawls data classification, broken link prioritization and developer-ready remediation tasks.',
                'icon' => 'fa-stethoscope',
                'is_priority' => false,
                'problem' => 'Website audit crawls generate massive raw data files with hundreds of warnings that overwhelm web teams and delay technical fixes.',
                'outcome' => 'An intelligent audit agent that ingests crawl outputs, deduplicates findings, prioritizes critical fixes, and writes clear developer action tickets.',
                'capabilities' => [
                    'Ingestion of standard crawl reports (Screaming Frog, Google Search Console, Ahrefs)',
                    'Classification of issues: critical errors, performance bottlenecks, metadata gaps',
                    'Grouping of affected URLs with prioritized developer remediation steps',
                    'Detection of missing canonicals, duplicate title tags, and thin content pages',
                    'Preparation of sprint-ready GitHub or Jira ticket drafts for developers',
                    'Audit comparison tracking to verify if past fixes were properly implemented'
                ],
                'technical_approach' => 'The agent parses CSV/JSON crawl exports, evaluates findings against established technical SEO rules, and synthesizes clear markdown action summaries for developers.',
                'deliverables' => [
                    'Website Audit AI Agent tool integration',
                    'Custom prioritization rule configuration (e.g. 404s and canonicals as P1)',
                    'Developer ticket template generation scripts',
                    'Audit review workflow guide'
                ],
                'inputs_needed' => 'Website crawl export files, Google Search Console performance data, and team ticketing system preferences.',
                'limitations' => 'The agent evaluates provided crawl data; it does not perform live penetration testing, legal compliance reviews, or code vulnerability audits.',
                'faqs' => [
                    [
                        'q' => 'Does this agent fix code directly on our production server?',
                        'a' => 'No. The agent analyzes crawl data and generates structured recommendations and tickets for your development team to review and deploy safely.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'google-business-profile-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'marketing-search',
                'name' => 'Google Business Profile AI Agent',
                'short_desc' => 'Supports authorized business descriptions, service content, post ideas, FAQ drafts, and review-response drafts for local profiles.',
                'target_keyword' => 'Google Business Profile AI agent',
                'meta_title' => 'Google Business Profile AI Agent | TC Smart',
                'meta_description' => 'Assisted local profile management: draft Google updates, generate professional review replies and organize FAQs with business owner review.',
                'icon' => 'fa-map-marked-alt',
                'is_priority' => false,
                'problem' => 'Maintaining active Google Business Profiles with fresh updates and professional review responses is time-consuming for multi-location businesses.',
                'outcome' => 'An efficient assistant that drafts localized business descriptions, product highlights, customer review replies, and Q&A entries for manager approval.',
                'capabilities' => [
                    'Drafting compliant business descriptions highlighting verified local services',
                    'Generating weekly Google post announcements and holiday update drafts',
                    'Preparing professional, empathetic customer review response drafts',
                    'Structuring common customer questions and approved answers for profile FAQs',
                    'Profile completeness checks against Google guidelines',
                    'All outputs require authorized business manager review prior to publishing'
                ],
                'technical_approach' => 'The agent is trained on your verified business facts, service categories, and customer service response policies. It generates drafts formatted specifically for Google Business Profile character limits.',
                'deliverables' => [
                    'Google Business Profile AI Agent workflow setup',
                    'Review response policy template and tone guidelines',
                    'Monthly post draft generation pipeline',
                    'Profile management best-practices manual'
                ],
                'inputs_needed' => 'Verified business address, official telephone, operating hours, service catalog, and customer service reply preferences.',
                'limitations' => 'Requires manual approval and submission by an authorized profile manager. Does not guarantee Google Maps ranking improvements or Google partner endorsements.',
                'faqs' => [
                    [
                        'q' => 'Can the agent respond to reviews automatically without my approval?',
                        'a' => 'We configure all review responses as drafts for human approval, ensuring that customer communications remain accurate and brand-aligned.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'rag-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'knowledge-productivity',
                'name' => 'RAG AI Agent',
                'short_desc' => 'Retrieval-Augmented Generation solution that answers queries using approved documents, manuals, and knowledge bases with source citations.',
                'target_keyword' => 'enterprise RAG AI agent development',
                'meta_title' => 'Enterprise RAG AI Agent Development | TC Smart',
                'meta_description' => 'Document-grounded RAG AI agents: secure semantic vector search, strict document citations and private corporate knowledge retrieval.',
                'icon' => 'fa-book-reader',
                'is_priority' => false,
                'problem' => 'Engineers, technicians, and customer teams waste hours searching through hundreds of PDFs, technical manuals, and SOPs to find specific operational answers.',
                'outcome' => 'A private, document-grounded AI assistant that retrieves precise technical answers from verified corporate PDFs, citing the exact page and source reference.',
                'capabilities' => [
                    'Document ingestion pipeline: PDFs, Word documents, Markdown, policy manuals',
                    'Semantic chunking and embedding generation stored in secure vector databases',
                    'Strict citation enforcement: answers include document title, chapter, and page number',
                    'Hallucination prevention: answers only from provided documents; states if unknown',
                    'Role-based document access: ensures users only query authorized internal files',
                    'Private deployment options: on-premise LLMs or private cloud API integrations'
                ],
                'technical_approach' => 'Documents are parsed, cleaned, and embedded into a vector database (e.g. Qdrant / pgvector). Hybrid semantic and keyword search retrieves top relevant passages, which are synthesized by a guarded LLM into a cited response.',
                'deliverables' => [
                    'Deployed RAG AI Agent web interface / chat widget',
                    'Vector database setup and automated document ingestion pipeline',
                    'Configured citation and answer verification guardrails',
                    'Knowledge base management handbook and security audit documentation'
                ],
                'inputs_needed' => 'Set of approved source documents (PDFs, manuals, SOPs), user permission tiers, and hosting preference (cloud vs private server).',
                'limitations' => 'The agent’s knowledge is bounded by the documents provided. It does not replace engineering judgement or authoritative safety decisions.',
                'faqs' => [
                    [
                        'q' => 'How does the RAG agent prevent hallucinated or false answers?',
                        'a' => 'The prompt architecture strictly instructs the model to only use retrieved document passages. If an answer cannot be verified in the source text, the agent explicitly states that the information is not found in the documents.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'personal-ai-assistant-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'knowledge-productivity',
                'name' => 'Personal AI Assistant Agent',
                'short_desc' => 'Supports user-approved tasks such as note organization, reminders, draft preparation, information retrieval, and productivity workflows.',
                'target_keyword' => 'personal AI assistant agent development',
                'meta_title' => 'Personal AI Assistant Agent | TC Smart Technology',
                'meta_description' => 'Controlled personal AI assistant for executive task management, meeting note synthesis, draft preparation and calendar reminders.',
                'icon' => 'fa-user-cog',
                'is_priority' => false,
                'problem' => 'Busy executives and engineers struggle to summarize lengthy meeting recordings, synthesize task lists, and track action items across busy days.',
                'outcome' => 'A governed personal productivity agent that condenses notes, extracts action items, prepares email drafts, and sets reminders with user confirmation.',
                'capabilities' => [
                    'Meeting transcript summarization and key decision extraction',
                    'Action item organization with assigned owners and deadline tags',
                    'Draft preparation for emails, memos, and internal project updates',
                    'Calendar reminder drafting and daily schedule briefing synthesis',
                    'Granular permission scopes: sensitive actions require explicit user confirmation',
                    'Data privacy guarantee: executive notes are never used for public model training'
                ],
                'technical_approach' => 'The assistant connects via approved secure API scopes to authorized personal productivity tools. A stateful memory module maintains context while enforcing strict data retention policies.',
                'deliverables' => [
                    'Personal AI Assistant interface configured for desktop/mobile',
                    'Meeting summary and action item extraction templates',
                    'Tool integration permissions setup (calendar/notes/mail drafts)',
                    'Privacy and credential management guide'
                ],
                'inputs_needed' => 'Target productivity tools to connect, preferred summary formats, and user privacy constraints.',
                'limitations' => 'The assistant proposes drafts and reminders; it does not send communications or commit calendar events without user confirmation.',
                'faqs' => [
                    [
                        'q' => 'Is our company data used to train public AI models?',
                        'a' => 'No. We configure enterprise-tier APIs and private deployment instances where customer data is strictly confidential and zero data retention for training is guaranteed.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'lead-generation-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'lead-outreach',
                'name' => 'Lead Generation AI Agent',
                'short_desc' => 'Supports target-customer definition, permitted research, qualification, personalized draft preparation, and CRM-ready lead records.',
                'target_keyword' => 'lead generation AI agent development',
                'meta_title' => 'Lead Generation AI Agent Development | TC Smart',
                'meta_description' => 'Permitted B2B lead qualification, ICP profiling, personalized draft preparation and CRM record synchronization.',
                'icon' => 'fa-user-check',
                'is_priority' => false,
                'problem' => 'Sales teams waste countless hours sifting through unqualified inquiries, manually researching company domains, and typing repetitive initial outreach emails.',
                'outcome' => 'An automated qualification agent that enriches inbound leads from permitted sources, scores them against your Ideal Customer Profile (ICP), and prepares CRM drafts.',
                'capabilities' => [
                    'Inbound inquiry parsing and classification based on commercial relevance',
                    'Enrichment from authorized public domain sources (company size, sector, location)',
                    'Ideal Customer Profile (ICP) scoring according to agreed qualification criteria',
                    'Personalized initial email draft preparation tailored to the prospect’s sector',
                    'Structuring clean, formatted lead records ready for push into your CRM',
                    'Strict compliance: does not perform unauthorized bulk scraping or spam messaging'
                ],
                'technical_approach' => 'The agent monitors designated lead webhooks, extracts company domains, queries permitted business directories, and evaluates match scores before generating personalized sales drafts for rep approval.',
                'deliverables' => [
                    'Lead Generation AI Agent pipeline and qualification rules',
                    'ICP scoring matrix configured to your business model',
                    'CRM integration connector (HubSpot, Zoho, Salesforce, or custom DB)',
                    'Sales team outreach review workflow guidelines'
                ],
                'inputs_needed' => 'Target customer profile criteria (industries, company sizes, locations), CRM API keys, and sales communication tone guidelines.',
                'limitations' => 'Does not scrape restricted data, purchase unsolicited lists, or automatically dispatch bulk cold emails. Outreach actions remain under sales rep control.',
                'faqs' => [
                    [
                        'q' => 'Does this agent send bulk automated unsolicited emails?',
                        'a' => 'No. We strictly adhere to anti-spam laws (CAN-SPAM, GDPR). The agent qualifies inbound or permitted leads and prepares drafts for human sales review.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'linkedin-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'lead-outreach',
                'name' => 'LinkedIn AI Agent',
                'short_desc' => 'Supports compliant profile content, professional post drafts, permitted research frameworks, and user-controlled outreach preparation.',
                'target_keyword' => 'LinkedIn AI agent development',
                'meta_title' => 'LinkedIn AI Agent Development | TC Smart Technology',
                'meta_description' => 'Compliant LinkedIn content drafting: thought-leadership posts, personalized connection message drafts and user-controlled follow-up planning.',
                'icon' => 'fa-linkedin',
                'is_priority' => false,
                'problem' => 'Professionals and founders lack the time to draft consistent technical thought-leadership content and research relevant industry contacts on LinkedIn.',
                'outcome' => 'A compliant AI assistant that generates engaging professional post drafts, headline ideas, and personalized outreach notes for manual user review and sending.',
                'capabilities' => [
                    'Thought-leadership post drafting based on project case studies and industry trends',
                    'LinkedIn profile optimization drafts: headline, about section, and experience bullets',
                    'Preparation of personalized, polite connection message drafts based on public info',
                    'Follow-up message planning templates for genuine professional networking',
                    'Content calendar organization aligned with professional industry events',
                    'Full compliance with LinkedIn Terms of Service: strictly zero bots or unauthorized automation'
                ],
                'technical_approach' => 'The agent functions as an external writing assistant and research organizer. Content is drafted inside your workspace for you to manually copy and post directly through your official LinkedIn account.',
                'deliverables' => [
                    'LinkedIn AI writing and post-drafting assistant setup',
                    'Industry content themes and post templates library',
                    'Outreach message draft generator module',
                    'Platform compliance and safety checklist'
                ],
                'inputs_needed' => 'User professional background, target audience/industry, preferred writing tone, and sample topics of interest.',
                'limitations' => 'Does not scrape LinkedIn, use unauthorized browser extensions, send automatic connection requests, or auto-like/comment. All actions must be performed manually by the account owner.',
                'faqs' => [
                    [
                        'q' => 'Will this agent get my LinkedIn account restricted or banned?',
                        'a' => 'No, because our agent does NOT connect bots or unauthorized scrapers to LinkedIn. It acts purely as an external writing and brainstorming assistant; you review and post manually.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'whatsapp-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'customer-communication',
                'name' => 'WhatsApp AI Agent',
                'short_desc' => 'Handles approved WhatsApp Business enquiries, FAQs, lead capture, service information, reminders, and seamless human agent handover.',
                'target_keyword' => 'WhatsApp AI agent development',
                'meta_title' => 'WhatsApp AI Agent Development | TC Smart Technology',
                'meta_description' => 'Official WhatsApp Business AI chatbot: instant 24/7 FAQ responses, lead qualification and automated human agent handover.',
                'icon' => 'fa-whatsapp',
                'is_priority' => false,
                'problem' => 'Customers expect instant replies on WhatsApp, but human support teams cannot respond 24/7, leading to dropped leads and slow quote response times.',
                'outcome' => 'An official WhatsApp Business AI agent that answers verified FAQs instantly, captures prospective project details, and escalates to human engineers when needed.',
                'capabilities' => [
                    'Official Meta WhatsApp Cloud API integration with verified phone numbers',
                    'Instant 24/7 answers to verified company FAQs, office hours, and service categories',
                    'Interactive lead capture: collects project type, equipment model, and contact details',
                    'Order status and service inquiry lookup against authorized database APIs',
                    'Smart human handover: seamlessly routes complex conversations to human support staff',
                    'Compliance with Meta WhatsApp Business messaging policies and opt-in consent'
                ],
                'technical_approach' => 'Webhooks from Meta Cloud API trigger a governed conversational engine grounded in your approved FAQ knowledge base. High-intent queries trigger notifications to your sales desk for immediate human takeover.',
                'deliverables' => [
                    'Configured WhatsApp Business AI conversational workflow',
                    'Meta Cloud API webhook and template registration guidance',
                    'Approved FAQ knowledge base and qualification prompt rules',
                    'Human handover routing setup and live chat dashboard'
                ],
                'inputs_needed' => 'Official WhatsApp Business account, verified Meta Business Manager, list of approved FAQs, and escalation staff contact numbers.',
                'limitations' => 'Requires official Meta WhatsApp API approval; conversation message fees from Meta apply. Does not send unsolicited promotional bulk spam.',
                'faqs' => [
                    [
                        'q' => 'What happens when a customer asks a complex question the AI cannot answer?',
                        'a' => 'The agent gracefully informs the customer that a human engineer is required and immediately notifies your team via email/dashboard with the conversation history for seamless takeover.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'gmail-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'customer-communication',
                'name' => 'Gmail AI Agent',
                'short_desc' => 'Classifies incoming business emails, extracts key data, prepares draft responses, follow-up reminders, and routes approved workflows.',
                'target_keyword' => 'Gmail AI agent development',
                'meta_title' => 'Gmail AI Agent Development | TC Smart Technology',
                'meta_description' => 'Governed Gmail workflow automation: email classification, inquiry extraction, draft replies and human-approved response routing.',
                'icon' => 'fa-envelope',
                'is_priority' => false,
                'problem' => 'High-volume business inboxes are flooded with RFQs, support tickets, invoices, and spam, causing delayed responses to high-value customer inquiries.',
                'outcome' => 'An authorized email processing agent that categorizes incoming messages, extracts project requirements, drafts professional replies, and queues them for human approval.',
                'capabilities' => [
                    'Automated email classification: RFQ, Technical Support, Invoicing, General Inquiry, Spam',
                    'Extraction of key fields: customer name, phone number, machine model, urgency',
                    'Contextual draft generation in Gmail drafts folder for staff review',
                    'Automated label assignment and routing to designated department folders',
                    'Follow-up reminder triggers for unanswered client quotations',
                    'Strict security: runs via authorized Google OAuth with zero autonomous email sending'
                ],
                'technical_approach' => 'Using authorized Google Workspace APIs, the agent reads inbound messages, passes the body to a classification and draft model, and saves the output into Gmail’s "Drafts" folder for human review and single-click sending.',
                'deliverables' => [
                    'Gmail AI Agent workflow integrated with your business Google Workspace',
                    'Email classification rules and response templates',
                    'Automated Gmail label and folder routing rules',
                    'OAuth security permissions and audit log manual'
                ],
                'inputs_needed' => 'Google Workspace administrator access to configure OAuth scopes, sample customer emails, and preferred reply templates.',
                'limitations' => 'The agent drafts replies into Gmail drafts; it never sends emails automatically without human review. Account credentials are encrypted with strict access control.',
                'faqs' => [
                    [
                        'q' => 'Will the agent accidentally send an incorrect reply to a client?',
                        'a' => 'No. All generated responses are saved strictly into your "Drafts" folder. You or your team must review, edit if necessary, and click "Send" manually.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ],

            'voice-calling-ai-agent' => [
                'category_slug' => 'ai-solutions-custom-ai-agents',
                'subcategory_slug' => 'customer-communication',
                'name' => 'Voice Calling AI Agent',
                'short_desc' => 'Supports approved inbound or outbound voice workflows such as inquiry handling, appointment confirmation, reminders, and human escalation.',
                'target_keyword' => 'voice calling AI agent development',
                'meta_title' => 'Voice Calling AI Agent Development | TC Smart Technology',
                'meta_description' => 'Consent-aware voice AI agent: appointment confirmation, routine inquiry triage, clear identity disclosure and human call transfer.',
                'icon' => 'fa-phone-volume',
                'is_priority' => false,
                'problem' => 'Front-desk staff spend excessive time making routine appointment confirmation calls and answering basic repetitive inquiry questions over the phone.',
                'outcome' => 'A natural, consent-aware voice agent that handles routine phone inquiries, confirms consultation bookings, and immediately transfers callers to human staff when requested.',
                'capabilities' => [
                    'Low-latency speech-to-text (STT) and natural text-to-speech (TTS) voice synthesis',
                    'Clear, mandatory upfront disclosure identifying the call as an AI assistant',
                    'Structured inquiry capture: booking confirmations, service scheduling, address inquiries',
                    'Immediate call transfer / escalation to a live human representative at any point',
                    'Automatic call summarization and structured notes synced to your CRM',
                    'Strict compliance with telecommunications calling hour rules and opt-out requests'
                ],
                'technical_approach' => 'The voice agent connects to telephony providers (e.g. Twilio) via SIP trunks. Audio streams are transcribed in real-time, processed through guarded conversation logic, and returned via neural voice synthesis.',
                'deliverables' => [
                    'Voice Calling AI Agent configuration and telephony webhook setup',
                    'Approved conversational call script and verification dialogue rules',
                    'Call transfer logic and live agent notification system',
                    'Telephony compliance, opt-out handling, and call recording guidelines'
                ],
                'inputs_needed' => 'Telephony provider account (Twilio / Exotel), target phone numbers, approved call scripts, transfer phone numbers, and call recording compliance consent.',
                'limitations' => 'Must disclose AI identity; does not impersonate humans, execute unsolicited cold-telemarketing, or operate outside permitted local calling hours.',
                'faqs' => [
                    [
                        'q' => 'Does the voice agent disclose that it is an artificial intelligence?',
                        'a' => 'Yes. In compliance with telecommunications standards and ethical guidelines, the agent always introduces itself transparently as an automated assistant.'
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ]
        ];
    }
}
