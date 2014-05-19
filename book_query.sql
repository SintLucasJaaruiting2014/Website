select
	trim(concat_ws(' ', profile.first_name, trim(concat_ws(' ', profile.last_name_prefix, profile.last_name)))) as naam,
	program.name as opleiding,
	lower(profile.first_name) as sint,
	concat('Macintosh HD:Users:RobertvandenBroek:JAARBOEK_MBO_V1:ehv:werk:', media.id, '.', media.value) as werk,
	concat('Macintosh HD:Users:RobertvandenBroek:JAARBOEK_MBO_V1:ehv:foto:', user.student_id, '.jpg') as foto,
	profile.quote as quote,
	user.student_id as stamnummer
from
	profile_profiles as profile
join
	user_users as user on user.id = profile.user_id
join
	school_programs as program on program.id = profile.program_id
left join
	portfolio_items as portfolio on profile.id = portfolio.profile_id and portfolio.type_id = 2
left join
	media_items as media on media.linkable_id = portfolio.id
where
	program.type_id = 1
order by
	naam
