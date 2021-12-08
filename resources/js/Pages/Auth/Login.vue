<template>
	<div class="login-container">
		<div class="login-content">
			<div class="login-content-main">
				<img src="/images/logo_transparent.png" />
				<el-form class="login-content-form" @submit.prevent="form.post($route('login'))">
					<el-form-item :error="form.errors.email">
						<el-input
								type="text"
								placeholder="Email"
								prefix-icon="el-icon-user"
								v-model="form.email"
								clearable
								autocomplete="off"
								required
						>
						</el-input>
					</el-form-item>

					<el-form-item :error="form.errors.password">
						<el-input
								placeholder="Password"
								prefix-icon="el-icon-lock"
								v-model="form.password"
								autocomplete="off"
								:showPassword="true"
								required
						>
						</el-input>
					</el-form-item>

					<el-form-item>
							<el-checkbox v-model="form.remember">Remember Me</el-checkbox>
					</el-form-item>

					<el-form-item>
						<el-button native-type="submit" type="primary" class="login-content-submit" round
								:disabled="form.processing" :loading="form.processing">
								<span>Login</span>
						</el-button>
						<div class="to-main-page-container">
							<a href="/">Back to Home</a>
						</div>
					</el-form-item>
				</el-form>
			</div>
		</div>

		<div class="login-copyright">
			<div class="mb5 login-copyright-company">Copyright Company</div>
			<div class="login-copyright-msg">Copyright Msg</div>
		</div>
	</div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    name: 'Login',
    layout: null,

    setup () {
        const form = useForm({
            email: '',
            password: '',
            remember: false,
        });

        return { form };
    },
}
</script>

<style scoped lang="scss">
.login-container {
	width: 100%;
	height: 100%;
	background-size: 100% 100%;
    background-color: var(--el-text-color-primary);

	.login-content {
		width: 500px;
		padding: 40px 20px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%) translate3d(0, 0, 0);
		background-color: rgba(255, 255, 255, 0.99);
		border: 5px solid var(--color-primary-light-8);
		border-radius: 4px;
		transition: height 0.2s linear;
		overflow: hidden;
		z-index: 1;
		.login-content-main {
			margin: 0 auto;
			width: 80%;
			img {
					height: 200px;
					display: block;
					margin: 0 auto;
			}
			.login-content-title {
				color: var(--color-primary);
				font-weight: 500;
				font-size: 22px;
				text-align: center;
				margin: 20px 0;
				white-space: nowrap;
			}
		}
	}
	.login-copyright {
		position: absolute;
		left: 50%;
		transform: translateX(-50%);
		bottom: 30px;
		text-align: center;
		color: white;
		font-size: 12px;
		opacity: 0.8;
		.login-copyright-company {
			white-space: nowrap;
		}
		.login-copyright-msg {
			@extend .login-copyright-company;
		}
	}
}

.login-content-form {
	margin-top: 20px;

    .el-form-item {
        margin-bottom: 14px;
    }

	.login-content-password {
		display: inline-block;
		width: 25px;
		cursor: pointer;
		&:hover {
			color: #909399;
		}
	}
	.login-content-code {
		display: flex;
		align-items: center;
		justify-content: space-around;
		.login-content-code-img {
			width: 100%;
			height: 40px;
			line-height: 40px;
			background-color: #ffffff;
			border: 1px solid rgb(220, 223, 230);
			color: #333;
			font-size: 16px;
			font-weight: 700;
			letter-spacing: 5px;
			text-indent: 5px;
			text-align: center;
			cursor: pointer;
			transition: all ease 0.2s;
			border-radius: 4px;
			user-select: none;
			&:hover {
				border-color: #c0c4cc;
				transition: all ease 0.2s;
			}
		}
	}
	.login-content-submit {
		width: 100%;
		letter-spacing: 2px;
		font-weight: 300;
		margin-top: 15px;
	}
}

.to-main-page-container {
	text-align: center;
	margin-top: 1rem;
	a {
		text-decoration: none;
	}
}
</style>
